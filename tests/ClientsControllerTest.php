<?php

use App\CSVModel\Client;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientsControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $this->call('GET', '/clients');

        $this->assertViewhas('clients');

        $this->assertResponseOk();
    }

    public function testInsert()
    {
    	$this->call('GET', '/clients/create');

    	$this->assertResponseOk();
    }

    public function testStore()
    {
    	$client = new Client();

    	$this->call('POST', '/clients/store', [
            'fullname' => 'Leonardo DiCaprio',
            'phone' => '2029393022',
            'email' => 'leo@leonardodicaprio.com',
            'address' => 'California, USA',
            'nationality' => 'American',
            'gender' => 'male',
            'dob' => '1974-11-11',
            'mode_of_contact' => 'email',
            'education' => 'Bachelor \'s',
        ]);

    }
}
