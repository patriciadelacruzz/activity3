@extends('layouts.mainlayout')
@section('title', 'Student Index')
@section('content')
<table>
<tr>
    <th>Student Number</th>
    <th>Last Name</th>
    <th>First Name</th>
    <th>Birthday</th>
    <th>Status</th>
</tr>

@forelse($students as $key => $student)
    <tr>
        <td>
            <p>{{ $key }}</p>
        </td>
        <td>
            <p>{{  $student['lastname'] }}</p>
        </td>
        <td>
            <p>{{  $student['firstname'] }}</p>
        </td>
        <td>
            <p>{{  $student['birthday'] }}</p>
        </td>
        <td>
            @if($student['isnewstudent']==true)
            <p>New Student</p>
            @else
            <p>Old Student</p>
            @endif
        </td>
        <td>
        <form action="<?php echo $key ?>/destroy" method="POST">
        @csrf
        <input type="hidden" name="name" value= <?php echo $key ?>>
        <input type="submit" name="submit" onclick="return confirm('Do you want to delete it? <?php echo $key ?>?')" value="Delete">
        </form>
        </td>
        <td>
    </tr>
</table>
@endsection