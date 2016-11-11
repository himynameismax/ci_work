<?php

/*
 * @version $Id$
 -------------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2015 Teclib'.

 http://glpi-project.org

 based on GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2014 by the INDEPNET Development Team.

 -------------------------------------------------------------------------

 LICENSE

 This file is part of GLPI.

 GLPI is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 GLPI is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with GLPI. If not, see <http://www.gnu.org/licenses/>.
 --------------------------------------------------------------------------
 */

/** @file
* @brief
*/

if (!defined('GLPI_ROOT')) {
   die("Sorry. You can't access directly to this file");
}

class ComputerAntivirus extends CommonDBChild {

   // From CommonDBChild
   static public $itemtype = 'Computer';
   static public $items_id = 'computers_id';
   public $dohistory       = true;

   static function getTypeName($nb=0) {
      return _n('Antivirus', 'Antiviruses', $nb);
   }


   /**
    * @see CommonGLPI::getTabNameForItem()
   **/
   function getTabNameForItem(CommonGLPI $item, $withtemplate=0) {

      // can exists for template
      if (($item->getType() == 'Computer')
          && Computer::canView()) {
         $nb = 0;
         if ($_SESSION['glpishow_count_on_tabs']) {
            $nb = countElementsInTable('glpi_computerantiviruses',
                                       "computers_id = '".$item->getID()."' AND `is_deleted`='0'");
         }
         return self::createTabEntry(self::getTypeName(Session::getPluralNumber()), $nb);
      }
      return '';
   }


   /**
    * @param $item            CommonGLPI object
    * @param $tabnum          (default 1)
    * @param $withtemplate    (default 0)
    */
   static function displayTabContentForItem(CommonGLPI $item, $tabnum=1, $withtemplate=0) {

      self::showForComputer($item, $withtemplate);
      return true;
   }


   /**
    * @see CommonGLPI::defineTabs()
    *
    * @since version 0.85
   **/
   function defineTabs($options=array()) {

      $ong = array();
      $this->addDefaultFormTab($ong);
      $this->addStandardTab('Log', $ong, $options);

      return $ong;
   }


   /**
    * Duplicate all antirivuses from a computer template to his clone
    *
    * @since version 0.84
    *
    * @param $oldid
    * @param $newid
   **/
   static function cloneComputer ($oldid, $newid) {
      global $DB;

      $query  = "SELECT *
                 FROM `glpi_computerantiviruses`
                 WHERE `computers_id` = '$oldid'";
      foreach ($DB->request($query) as $data) {
         $antirivus            = new self();
         unset($data['id']);
         $data['computers_id'] = $newid;
         $data                 = Toolbox::addslashes_deep($data);
         $antirivus->add($data);
      }
   }


   function getSearchOptions() {

      $tab = array();
      $tab['common'] = __('Characteristics');


      $tab[1]['table']           = $this->getTable();
      $tab[1]['field']           = 'name';
      $tab[1]['name']            = __('Name');
      $tab[1]['datatype']        = 'itemlink';
      $tab[1]['massiveaction']   = false; // implicit key==1

      $tab[2]['table']           = $this->getTable();
      $tab[2]['field']           = 'id';
      $tab[2]['name']            = __('ID');
      $tab[2]['massiveaction']   = false; // implicit field is id
      $tab[2]['datatype']        = 'number';
      $tab[2]['massiveaction']   = false; // implicit key==1

      $tab[3]['table']         = $this->getTable();
      $tab[3]['field']         = 'antivirus_version';
      $tab[3]['name']          = __('Antivirus version');
      $tab[3]['type']          = 'text';
      $tab[3]['massiveaction']   = false; // implicit key==1

      $tab[4]['table']         = $this->getTable();
      $tab[4]['field']         = 'is_active';
      $tab[4]['name']          = __('Active');
      $tab[4]['type']          = 'bool';
      $tab[4]['massiveaction']   = false; // implicit key==1

      $tab[5]['table']         = $this->getTable();
      $tab[5]['field']         = 'is_uptodate';
      $tab[5]['name']          = __('Up to date');
      $tab[5]['type']          = 'bool';
      $tab[5]['massiveaction']   = false; // implicit key==1

      $tab[6]['table']         = $this->getTable();
      $tab[6]['field']         = 'signature_version';
      $tab[6]['name']          = __('Signature database version');
      $tab[6]['type']          = 'text';
      $tab[6]['massiveaction']   = false; // implicit key==1

      $tab[19]['table']          = $this->getTable();
      $tab[19]['field']          = 'date_mod';
      $tab[19]['name']           = __('Last update');
      $tab[19]['datatype']       = 'datetime';
      $tab[19]['massiveaction']  = false;

      $tab[7]['table']          = $this->getTable();
      $tab[7]['field']          = 'date_creation';
      $tab[7]['name']           = __('Creation date');
      $tab[7]['datatype']       = 'datetime';
      $tab[7]['massiveaction']  = false;

      $tab[7]['table']          = $this->getTable();
      $tab[7]['field']          = 'date_expiration';
      $tab[7]['name']           = __('Expiration date');
      $tab[7]['datatype']       = 'datetime';
      $tab[7]['massiveaction']  = false;

      return $tab;
   }

   static function getSearchOptionsToAdd() {
      $tab = array();

      $tab['antivirus']          = _n('Antivirus', 'Antiviruses', Session::getPluralNumber());

      $tab[167]['table']         = 'glpi_computerantiviruses';
      $tab[167]['field']         = 'name';
      $tab[167]['name']          = __('Antivirus');
      $tab[167]['forcegroupby']  = true;
      $tab[167]['massiveaction'] = false;
      $tab[167]['datatype']      = 'dropdown';
      $tab[167]['joinparams']    = array('jointype' => 'child');

      $tab[168]['table']         = 'glpi_computerantiviruses';
      $tab[168]['field']         = 'antivirus_version';
      $tab[168]['name']          = __('Antivirus version');
      $tab[168]['forcegroupby']  = true;
      $tab[168]['massiveaction'] = false;
      $tab[168]['datatype']      = 'text';
      $tab[168]['joinparams']    = array('jointype' => 'child');

      $tab[169]['table']         = 'glpi_computerantiviruses';
      $tab[169]['field']         = 'is_active';
      $tab[169]['linkfield']     = '';
      $tab[169]['name']          = __('Active');
      $tab[169]['datatype']      = 'bool';
      $tab[169]['joinparams']    = array('jointype' => 'child');
      $tab[169]['massiveaction'] = FALSE;
      $tab[169]['forcegroupby']  = TRUE;
      $tab[169]['searchtype']    = array('equals');

      $tab[170]['table']         = 'glpi_computerantiviruses';
      $tab[170]['field']         = 'is_uptodate';
      $tab[170]['linkfield']     = '';
      $tab[170]['name']          = __('Is up to date');
      $tab[170]['datatype']      = 'bool';
      $tab[170]['joinparams']    = array('jointype' => 'child');
      $tab[170]['massiveaction'] = FALSE;
      $tab[170]['forcegroupby']  = TRUE;
      $tab[170]['searchtype']    = array('equals');

      $tab[171]['table']         = 'glpi_computerantiviruses';
      $tab[171]['field']         = 'signature_version';
      $tab[171]['name']          = __('Signature database version');
      $tab[171]['forcegroupby']  = true;
      $tab[171]['massiveaction'] = false;
      $tab[171]['datatype']      = 'text';
      $tab[171]['joinparams']    = array('jointype' => 'child');

      $tab[172]['table']         = 'glpi_computerantiviruses';
      $tab[172]['field']         = 'date_expiration';
      $tab[172]['name']          = __('Expiration date');
      $tab[172]['forcegroupby']  = true;
      $tab[172]['massiveaction'] = false;
      $tab[172]['datatype']      = 'date';
      $tab[172]['joinparams']    = array('jointype' => 'child');

      return $tab;
   }

   /**
   * Display form for antivirus
   *
   * @param $items_id integer ID of the antivirus
   * @param $options array
   *
   * @return bool TRUE if form is ok
   *
   **/
   function showForm($ID, $options=array()) {

      global $CFG_GLPI;

      if (!Session::haveRight("computer", UPDATE)) {
         return false;
      }

      $comp = new Computer();
      if ($ID > 0) {
         $this->check($ID, READ);
         $comp->getFromDB($this->fields['computers_id']);
      } else {
         $this->check(-1, CREATE, $options);
         $comp->getFromDB($options['computers_id']);
      }

      $this->showFormHeader($options);

      if ($this->isNewID($ID)) {
         echo "<input type='hidden' name='computers_id' value='".$options['computers_id']."'>";
      }

      echo "<tr class='tab_bg_1'>";
      echo "<td>".__('Computer')."</td>";
      echo "<td>".$comp->getLink()."</td>";
      if (Plugin::haveImport()) {
         echo "<td>".__('Automatic inventory')."</td>";
         echo "<td>";
         if ($ID && $this->fields['is_dynamic']) {
            Plugin::doHook("autoinventory_information", $this);
         } else {
            _e('No');
         }
         echo "</td>";
      } else {
         echo "<td colspan='2'></td>";
      }
      echo "</tr>\n";

      echo "<table class='tab_cadre_fixe' cellpadding='1'>";

      echo "<tr class='tab_bg_1'>";
      echo "<td>".__('Name')."</td>";
      echo "<td>";
      Html::autocompletionTextField($this, "name");
      echo "</td><td>";
      echo __('Active')."&nbsp;:";
      echo "</td>";
      echo "<td>";
      Dropdown::showYesNo('is_active', $this->fields['is_active']);
      echo "</td>";
      echo "</tr>";

      echo "<tr class='tab_bg_1'>";
      echo "<td>";
      echo __('Manufacturer')."&nbsp;:";
      echo "</td>";
      echo "<td>";
      Dropdown::show('Manufacturer', array('value' => $this->fields["manufacturers_id"]));
      echo "</td>";
      echo "<td>";
      echo __('Up to date')."&nbsp;:";
      echo "</td>";
      echo "<td>";
      Dropdown::showYesNo('is_uptodate', $this->fields['is_uptodate']);
      echo "</td>";
      echo "</tr>";

      echo "<tr class='tab_bg_1'>";
      echo "<td>";
      echo __('Antivirus version')."&nbsp;:";
      echo "</td>";
      echo "<td>";
      Html::autocompletionTextField($this, "antivirus_version");
      echo "</td>";
      echo "<td>";
      echo __('Signature database version')."&nbsp;:";
      echo "</td>";
      echo "<td>";
      Html::autocompletionTextField($this, "signature_version");
      echo "</td>";
      echo "</tr>";

      echo "<tr class='tab_bg_1'>";
      echo "<td>";
      echo __('Expiration date')."&nbsp;:";
      echo "</td>";
      echo "<td>";
      Html::showDateField("date_expiration", array('value' => $this->fields['date_expiration']));
      echo "</td>";
      echo "<td colspan='2'>";
      echo "</td>";
      echo "</tr>";

      $this->showFormButtons($options);

      return true;
   }

   /**
   * Print the computers antiviruses
   *
   * @param $comp                  Computer object
   * @param $withtemplate boolean  Template or basic item (default '')
   *
   * @return Nothing (call to classes members)
   **/
   static function showForComputer(Computer $comp, $withtemplate='') {
      global $DB;

      $ID = $comp->fields['id'];

      if (!$comp->getFromDB($ID)
          || !$comp->can($ID, READ)) {
         return false;
      }
      $canedit = $comp->canEdit($ID);


      if ($canedit
          && !(!empty($withtemplate) && ($withtemplate == 2))) {
         echo "<div class='center firstbloc'>".
               "<a class='vsubmit' href='computerantivirus.form.php?computers_id=$ID&amp;withtemplate=".
                  $withtemplate."'>";
         _e('Add an antivirus');
         echo "</a></div>\n";
      }

      echo "<div class='center'>";

      $query = "SELECT `glpi_computerantiviruses`.*
                FROM `glpi_computerantiviruses`
                WHERE `computers_id` = '$ID'
                      AND `is_deleted` = '0'";

      if ($result = $DB->query($query)) {
         echo "<table class='tab_cadre_fixehov'>";
         $colspan = 5;
         if (Plugin::haveImport()) {
            $colspan++;
         }
         echo "<tr class='noHover'><th colspan='$colspan'>".self::getTypeName($DB->numrows($result)).
              "</th></tr>";

         if ($DB->numrows($result)) {

            $header = "<tr><th>".__('Name')."</th>";
            if (Plugin::haveImport()) {
               $header .= "<th>".__('Automatic inventory')."</th>";
            }
            $header .= "<th>".__('Manufacturer')."</th>";
            $header .= "<th>".__('Antivirus version')."</th>";
            $header .= "<th>".__('Signature database version')."</th>";
            $header .= "<th>".__('Active')."</th>";
            $header .= "<th>".__('Up to date')."</th>";
            $header .= "<th>".__('Expiration date')."</th>";
            $header .= "</tr>";
            echo $header;

            Session::initNavigateListItems(__CLASS__,
                              //TRANS : %1$s is the itemtype name,
                              //        %2$s is the name of the item (used for headings of a list)
                                           sprintf(__('%1$s = %2$s'),
                                                   Computer::getTypeName(1), $comp->getName()));

            $antivirus = new self();
            while ($data = $DB->fetch_assoc($result)) {
               $antivirus->getFromDB($data['id']);
               echo "<tr class='tab_bg_2'>";
               echo "<td>".$antivirus->getLink()."</td>";
               if (Plugin::haveImport()) {
                  echo "<td>".Dropdown::getYesNo($data['is_dynamic'])."</td>";
               }
               if ($data['manufacturers_id']) {
                  echo "<td>".Dropdown::getDropdownName('glpi_manufacturers',
                                                        $data['manufacturers_id'])."</td>";
               } else {
                  echo "<td></td>";
               }
               echo "<td>".$data['antivirus_version']."</td>";
               echo "<td>".$data['signature_version']."</td>";
               echo "<td>".Dropdown::getYesNo($data['is_active'])."</td>";
               echo "<td>".Dropdown::getYesNo($data['is_uptodate'])."</td>";
               echo "<td>".Html::convDate($data['date_expiration'])."</td>";
               echo "</tr>";
               Session::addToNavigateListItems(__CLASS__, $data['id']);
            }
            echo $header;
         } else {
            echo "<tr class='tab_bg_2'><th colspan='$colspan'>".__('No item found')."</th></tr>";
         }

         echo "</table>";
      }
      echo "</div><br>";
   }

}


?>
