<?php
    //class name, must start with a capital
    class
    {
        // class properties // private,public or protected //
        private $var;
        protected $id;
        public $;

        //Constructor // order matters for indexed arrays
        function __construct($var, $id)
        {
            $this->varr = $var;
            $this->id = $id;
        }
///////////////////////////// SETTERS AND GETTERS ///////////////////////////
        //Setter
        function setVariableName($new_var_name)
        {
            $this->var_name = (string) $new_var_name;
        }
        //Getters
        function getVariableName()
        {
            return $this->var_name;
        }


/////////////////////////////// METHODS /////////////////////////////////////
        //Save Method
        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO stylist (stylist_name) VALUES ('{$this->getStylistName()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        //Static getAll Method
        static function getAll()
        {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM cuisines;");
            $stylists = array();
            foreach($returned_stylists as $stylist) {
                $stylist_name = $stylist['stylist_name'];
                $id = $stylist['id'];
                $new_stylist = new Stylist($stylist_name, $id);
                array_push($stylists, $new_stylist);
            }
            return $stylists;
        }

        //Static deleteAll Method
        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists;");
        }

        //Static Find Method
        static function find($search_id)
        {
            $found_stylist = null;
            $stylists = Stylist::getAll();
            foreach ($stylists as $stylist){
                $stylist_id = $stylist->getId();
                if ($stylist_id == $search_id) {
                    $found_stylist = $stylist;
                }
            }
            return $found_stylist;
        }

        //getClients Method
        function getClients()
        {
            $clients = array();
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients WHERE stylist_id = {$this->getId()};");
            foreach ($returned_clients as $client) {
                $client_name = $client['client_name'];
                $id = $client['id'];
                $stylist_id = $client['stylist_id'];
                $new_client = new Client($client_name, $id, $stylist_id);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        //Update Method
        function update($new_stylist_name)
        {
            $GLOBALS['DB']->exec("UPDATE stylist SET stylist_name = '{$new_stylist_name}' WHERE id = {$this->getId()};");
            $this->setStylistName($new_stylist_name);
        }

        //Delete Method
        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylist WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM client WHERE stylist_id = {$this->getId()};");
        }
    }
?>
