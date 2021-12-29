<html>
<head>
    <title>PRINT OUT EMPLOYEE</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <style type='text/css'>
	table {
		border: 1px solid #ccc;
		border-collapse: collapse;
		margin: 0;
		padding: 0;
		width: 100%;
		table-layout: fixed;
		}

		table caption {
		font-size: 1.5em;
		margin: .5em 0 .75em;
		}

		table tr {
		background-color: #f8f8f8;
		border: 1px solid #ddd;
		padding: .35em;
		}

		table th,
		table td {
		padding: .625em;
		text-align: center;
		}

		table th {
		font-size: .85em;
		letter-spacing: .1em;
		text-transform: uppercase;
		}

		@media screen and (max-width: 600px) {
		table {
			border: 0;
		}

		table caption {
			font-size: 1.3em;
		}
		
		table thead {
			border: none;
			clip: rect(0 0 0 0);
			height: 1px;
			margin: -1px;
			overflow: hidden;
			padding: 0;
			position: absolute;
			width: 1px;
		}

		table tbody {
			background-color: #fff !important;
		}
		
		table tr {
			border-bottom: 3px solid #ddd;
			display: block;
			margin-bottom: .625em;
		}
		
		table td {
			border-bottom: 1px solid #ddd;
			display: block;
			font-size: .8em;
			text-align: right;
		}
		
		table td::before {
			/*
			* aria-label has no advantage, it won't be read inside a table
			content: attr(aria-label);
			*/
			content: attr(data-label);
			float: left;
			font-weight: bold;
			text-transform: uppercase;
		}
		
		table td:last-child {
			border-bottom: 0;
		}
		}

		/* general styling */
		body {
		font-family: "Open Sans", sans-serif;
		line-height: 1.25;
		}
	
    </style>
</head>
<body>
	<table>
		<caption>EMPLOYEES</caption>
		<thead>
		  <tr>
			<th scope="col">Name</th>
			<th scope="col">Email</th>
			<th scope="col">Company</th>
		  </tr>
		</thead>
		<tbody>
			@foreach ($model as $value)
				<tr>
					<td data-label="Name">{{$value['name'] ?? null }}</td>
					<td data-label="Email">{{$value['email'] ?? null }}</td>
					<td data-label="Company">{{$value['company']['name'] ?? null}}</td>
				</tr>
		  	@endforeach
		</tbody>
	</table>
</body>
</html>