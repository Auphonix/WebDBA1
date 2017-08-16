<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpConsole;
use App\User;
use App\Ticket;
use App\Http\Requests\QueryRequest;

class QueryController extends Controller
{
    public function create()
    {

        $user = new User;
        return view('query.create', ['user' => $user]);
    }

    public function store(QueryRequest $request)
    {

        $allRequests = $request->all();
        $adminFormat = '@admin.rmit.edu.au';


        // Determine whether user is admin based off of email type
        if (strpos($allRequests['email'], $adminFormat) !== false) $allRequests['isAdmin'] = true;
        else $allRequests['isAdmin'] = false;

        // Determine whether user exists
        $allUsers = User::all();
        $exists = false;
        foreach ($allUsers as $tmpUser) if ($allRequests['email'] == $tmpUser['email']) $exists = true;

        // Save to DB
        if (!$exists) $this->saveUser($allRequests);
        $this->saveTicket($allRequests);

        // Finish store
        return redirect()->route('query.create')->with('success', 'Query added successfully');
    }



    /*---------HELPER METHODS-------------*/

    // Save new User to DB
    private function saveUser($allRequests)
    {
        $user = new User;
        $user->email = $allRequests['email'];
        $user->firstName = $allRequests['firstName'];
        $user->lastName = $allRequests['lastName'];
        $user->isAdmin = $allRequests['isAdmin'];
        $user->save();
    }

    // Save new Ticket to DB
    private function saveTicket($allRequests)
    {
        $ticket = new Ticket();
        $ticket->useremail = $allRequests['email'];
        $ticket->operatingSystem = $allRequests['operatingSystem'];
        $ticket->status = "Pending";
        $ticket->issue = $allRequests['issue'];
        $ticket->save();
    }
}
