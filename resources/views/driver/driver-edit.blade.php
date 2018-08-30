<!DOCTYPE html>
<html lang="en">
<head>
    <title>Driver</title>

</head>
<body>
    <table frame="box"  rules="none" width=350 height=200>
        <thead>
            <tr>
                <th align="center">Edit Driver Information</th>
            </tr>
        </thead>
            <tr><td>
                <table align="Center" frame="box" width=340 height=150>
                <form method="POST" action="{{route('driver.update', $driver['driver_id'])}}">
                @csrf
                    <tr><td><table align="center">
                        <tr><td align="right">Name:   </td>
                            <td align="left"><input name="driver_name" value="{{$driver['driver_name']}}" type="text"  style="
                            width: 150px;
                            padding-top: 1px;
                            border-left-width: 2px;

                            "><br>
                            </td>
                        </tr>
                    <tr><td align="right">Email:   </td>
                        <td align="left"><input name="email" value="{{$driver['email']}}" readonly type="text" style="
                        width: 150px;
                        padding-top: 1px;
                        border-left-width: 2px;

                        "><br>
                        </td>
                    </tr>
                    <!--tr><td align="right">Password:   </td>
                        <td align="left"><input name="password" value="{{$driver['password']}}" type="text" style="
                        width: 150px;
                        padding-top: 1px;
                        border-left-width: 2px;

                        "><br>
                        </td>
                    </tr-->
                    <tr><td align="right">Phone:   </td>
                        <td align="left"><input name="phone" value="{{$driver['phone']}}" type="text" style="
                        width: 150px;
                        padding-top: 1px;
                        border-left-width: 2px;

                        "><br>
                        </td>
                    </tr>

                </table>
             <tr><td align="center">
             <!--input name="driver_id" value="{{$driver['driver_id']}}" type="hidden"-->
             <!--input name="password" value="{{$driver['password']}}" type="hidden"-->
             <input type="submit" value="Save">
            </form>

            </table>
                    </tr></td>
                </td>
            </tr>
    </table>
<a href="{{route('driver.view')}}"><div>back</div></a>
</body>
</html>