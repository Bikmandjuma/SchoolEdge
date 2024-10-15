@component('mail::message')
    <h2>Hello,</h2>
    <p>We have a new customer who has partially registered on the <b style="color: blue;">{{ config('app.name', 'SchoolEdge') }}</b> system.</p>

@component('mail::panel')
    <p>Please review the details and complete the registration process by approve them !</p>

    <table>
        
        <tr>
            <td>School_name : </td> <td>{{ $data['school_name'] }}</td>
        </tr>

        <tr>
            <td>Email : </td> <td>{{ $data['email'] }}</td>
        </tr>

        <tr>
            <td>Phone : </td> <td>{{ $data['phone'] }}</td>
        </tr>

    </table>

@endcomponent

<p>Thank you, and have a great day!</p>
@endcomponent
