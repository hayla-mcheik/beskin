<!Doctype html>
<html>
    <head>
        <title>New Appointment Created</title>
    </head>
    <body>
        <h1>New Appointment Created</h1>
        <p>A new appointment has been created with the following details:</p>
        <ul>
            <li>Name: {{ $appointment->name }}</li>
            <li>Email: {{ $appointment->email }}</li>
            <li>Phone: {{ $appointment->phone }}</li>
            <li>Service: {{ $appointment->service->name }}</li>
            <li>Doctor: {{ $appointment->doctor->name }}</li>
            <li>Slot: {{ $appointment->slot->start_time }} - {{ $appointment->slot->end_time }}</li>
        </ul>
    </body>
    </html>
