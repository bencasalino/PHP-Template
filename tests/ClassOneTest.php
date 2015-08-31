<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Stylist.php";
    require_once "src/Client.php";

    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';

    $DB = new PDO($server, $username, $password);
    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Client::deleteAll();
            Stylist::deleteAll();
        }

        //get cleint name
        function test_getClientName()
        {
            //Arrange
            $stylist_name = "jerry";
            $id = null;
            $test_stylist = new Stylist($stylist_name, $id);
            $test_stylist->save();
            $client_name = "george";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client_name, $id, $stylist_id);

            //Act
            $result = $test_client->getClientName();

            //Assert
            $this->assertEquals($client_name, $result);
        }

        //get id
        function test_getId()
        {
            //Arrange
            $stylist_name = "elaine";
            $id = null;
            $test_stylist = new Stylist($stylist_name, $id);
            $test_stylist->save();
            $client_name = "kramer";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client_name, $id, $stylist_id);
            $test_client->save();

            //Act
            $result = $test_client->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        // get cat id
        function test_getCategoryId()
        {
            //Arrange
            $stylist_name = "john";
            $id = null;
            $test_stylist = new Stylist($stylist_name, $id);
            $test_stylist->save();
            $client_name = "jack";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client_name, $id, $stylist_id);
            $test_client->save();

            //Act
            $result = $test_client->getStylistId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        // test save
        function test_save()
        {
            //Arrange
            $stylist_name = "joe";
            $id = null;
            $test_stylist = new Stylist($stylist_name, $id);
            $test_stylist->save();
            $client_name = "bob";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client_name, $id, $stylist_id);

            //Act
            $test_client->save();

            //Assert
            $result = Client::getAll();
            $this->assertEquals($test_client, $result[0]);
        }

        // test get all
        function test_getAll()
        {
            //Arrange
            $stylist_name = "stylist 1 ";
            $id = null;
            $test_stylist = new Stylist($stylist_name, $id);
            $test_stylist->save();
            $client_name = "person 1 ";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client_name, $id, $stylist_id);
            $test_client->save();
            $client_name2 = "person 2 ";
            $test_client2 = new Client($client_name2, $id, $stylist_id);
            $test_client2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }

        // del all
        function test_deleteAll()
        {
            //Arrange
            $stylist_name = "bob";
            $id = null;
            $test_stylist = new Stylist($stylist_name, $id);
            $test_stylist->save();
            $client_name = "ben";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client_name, $id, $stylist_id);
            $test_client->save();

            //Act
            $result = Client::deleteAll();
            $result = Client::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        // test find
        function test_find()
        {
            //Arrange
            $stylist_name = "jack";
            $id = null;
            $test_stylist = new Stylist($stylist_name, $id);
            $test_stylist->save();
            $client_name = "joe";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client_name, $id, $stylist_id);
            $test_client->save();
            $client_name2 = "jill";
            $test_client2 = new Client($client_name2, $id, $stylist_id);
            $test_client2->save();

            //Act
            $result = Client::find($test_client-> getId());

            //Assert
            $this->assertEquals($test_client, $result);
        }

        // test update
        function test_update()
        {
            //Arrange
            $stylist_name = "gary";
            $id = null;
            $test_stylist = new Stylist($stylist_name, $id);
            $test_stylist->save();
            $client_name = "jerry";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client_name, $id, $stylist_id);
            $test_client->save();
            $new_name = "larry";

            //Act
            $test_client->update($new_name);

            //Assert
            $this->assertEquals("larry", $test_client->getClientName());
        }

        // test delete
        function test_delete()
        {
            //Arrange
            $stylist_name = "bob";
            $id = null;
            $test_stylist = new Stylist($stylist_name, $id);
            $test_stylist->save();
            $client_name = "joe";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client_name, $id, $stylist_id);
            $test_client->save();
            $client_name2 = "jerry";
            $test_client2 = new Client($client_name2, $id, $stylist_id);
            $test_client2->save();

            //Act
            $test_client->delete();

            //Assert
            $this->assertEquals([$test_client2], Client::getAll());
        }
    }




?>
