
<title>PDF Document Title</title>
</head>

<style>
        #contentDashboard{
            background-color: green;
        }
</style>    
<body>
  <h1>PDF Document heading</h1>
  
  <table width="100%" style="width:100%" border="0">
        Ime: {{$customerData->name}}
        Prezime: {{$customerData->surname}}
        Email: {{$customerData->email}}
        Telefon: {{$customerData->phone}}</td>
        Grad: {{$customerData->city}}</td>
        <td>Lice: {{$customerData->status}}</td>
        <td>Cijena: {{$customerData->fee}}</td>
        <td>Popust: {{$customerData->discount}}</td>

        @foreach ($courses as $course)
            <tr>
                <td>{{$course}}</td>
            </tr>
        @endforeach
    </table>
</body>
</body>