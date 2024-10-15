@component('mail::message')
    <h2>Hello,</h2>
    <p>We have a new customer(school) who has partially registered on the <b style="color: blue;">{{ config('app.name', 'SchoolEdge') }}</b> system.</p>

@component('mail::panel')
    <p>The details are as follows :</p>

    School_name : {{ $data['school_name'] }}
    School_email : {{ $data['email'] }}
    School_phone : {{ $data['phone'] }}

@endcomponent

<p>Thank you, and have a great day!</p>
@endcomponent
