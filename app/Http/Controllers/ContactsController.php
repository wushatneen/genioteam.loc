<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\UpdateContactRequest;
use CristianPontes\ZohoCRMClient\Exception\UnexpectedValueException;
use Illuminate\Http\Request;
use CristianPontes\ZohoCRMClient\ZohoCRMClient;

class ContactsController extends Controller
{
    function getContacts()
    {
        $client = new ZohoCRMClient('Contacts', '0c9377ace8c7d74ffbc7dbe4f71abd97');
        try {
            $records = $client->getRecords()
                ->selectColumns('First Name', 'Last Name', 'Email', 'Fill Percentage')
                ->sortBy('Last Name')->sortAsc()
                ->fromIndex(1)
                ->toIndex(200)
                ->request();
        } catch (UnexpectedValueException $e) {
            return "UnexpectedValueException in ContactsController@getContacts: ".$e;
        }
        return view('index', compact('records'));
    }

    function getContact($contactId)
    {
        $client = new ZohoCRMClient('Contacts', '0c9377ace8c7d74ffbc7dbe4f71abd97');
        try {
            $record = $client->getRecordById($contactId)
                ->request();
            $record = $record[1];
        } catch (UnexpectedValueException $e) {
            return "UnexpectedValueException in ContactsController@getContacts: ".$e;
        }
        return view('edit', compact('record'));
    }

    function updateContact($contactId, UpdateContactRequest $request)
    {
        $client = new ZohoCRMClient('Contacts', '0c9377ace8c7d74ffbc7dbe4f71abd97');
        $client->updateRecords()
            ->addRecord(array(
                'Id' => $contactId,
                'First Name' => $_REQUEST['first_name'],
                'Last Name' => $_REQUEST['last_name'],
                'Email' => $_REQUEST['email'],
                'Fill Percentage' => floatval($_REQUEST['fill_percentage']),
            ))
            ->triggerWorkflow()
            ->request();
        return redirect('/');
    }

    function insertContact(CreateContactRequest $request)
    {
        $client = new ZohoCRMClient('Contacts', '0c9377ace8c7d74ffbc7dbe4f71abd97');
        $client->insertRecords()
            ->setRecords([
                array(
                    'First Name' => $_REQUEST['first_name'],
                    'Last Name' => $_REQUEST['last_name'],
                    'Email' => $_REQUEST['email'],
                    'Fill Percentage' => floatval($_REQUEST['fill_percentage']),
                )
            ])
            ->onDuplicateUpdate()
            ->triggerWorkflow()
            ->request();
        return redirect('/');
    }

    function deleteContact($contactId)
    {
        $client = new ZohoCRMClient('Contacts', '0c9377ace8c7d74ffbc7dbe4f71abd97');
        $client->deleteRecords()
            ->id($contactId)
            ->request();
        return redirect('/');
    }
}
