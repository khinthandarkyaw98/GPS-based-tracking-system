<!DOCTYPE html>
<html lang="en">
<head>
    <title>Driver</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
    <table frame="box"  rules="none" width=350 height=200>
        <thead>
            <tr>
                <th align="center">Add New Driver</th>
            </tr>
        </thead>
            <tr><td>
                <table align="Center" frame="box" width=340 height=150>
                <form method="POST" action="{{route('driver.store')}}">
                @csrf
                    <tr><td><table align="center">
                        <tr><td align="right">Name:   </td>
                            <td align="left"><input name="driver_name" type="text" style="
                            width: 150px;
                            padding-top: 1px;
                            border-left-width: 2px;

                            "><br>
                            </td>
                        </tr>
                    <tr><td align="right">Email:   </td>
                        <td align="left"><input name="email" type="text" style="
                        width: 150px;
                        padding-top: 1px;
                        border-left-width: 2px;

                        "><br>
                        </td>
                    </tr>
                    <tr><td align="right">Password:   </td>
                        <td align="left"><input name="password" type="password" style="
                        width: 150px;
                        padding-top: 1px;
                        border-left-width: 2px;

                        "><br>
                        </td>
                    </tr>
                    <tr><td align="right">Phone:   </td>
                        <td align="left"><input name="phone" type="text" style="
                        width: 150px;
                        padding-top: 1px;
                        border-left-width: 2px;

                        "><br>
                        </td>
                    </tr>

                </table>
             <tr><td align="center">
             <input type="submit" value="Save">
             <!--input type="submit" value="Cancel"--></tr></td>

            </form>

            </table>
                    </tr></td>
                </td>
            </tr>
    </table>
<a href="{{route('driver.view')}}"><div>back</div></a>
</body>
</html>