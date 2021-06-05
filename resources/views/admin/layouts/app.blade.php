<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Freelancer CRM is a open-source application to use manage project and clients.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@mdabad016">
    <meta property="twitter:creator" content="@mdabad016">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Freelancer CRM">
    <meta property="og:title" content="Freelancer CRM - Free to use">
    <meta property="og:url" content="https://accessabad.tech/">
    <meta property="og:image" content="https://accessabad.tech/img/profile-img.jpg">
    <meta property="og:description" content="Freelancer CRM is a open-source application to use manage project and clients.">
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assests/css/main.css') }}">
    <!-- Font-icon css-->

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="{{url('/')}}">Freelancer CRM</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">

        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
          <li><a class="dropdown-item" href="{{ url('/admin/profile') }}"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="{{ url('/admin-logout') }}"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="data:image/png;base64,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" alt="User Image" style="width: 20%;">
        <div>
          <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="{{url('/')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

      <li><a class="app-menu__item" href="{{ url('/admin/client') }}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Client</span></a></li>
      <li><a class="app-menu__item" href="{{ url('/admin/project') }}"><i class="app-menu__icon fa fa-tasks"></i><span class="app-menu__label">Project</span></a></li>
      <li><a class="app-menu__item" href="{{ url('/admin/transaction') }}"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Transaction</span></a></li>
        {{-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Forms</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="form-components.html"><i class="icon fa fa-circle-o"></i> Form Components</a></li>
            <li><a class="treeview-item" href="form-custom.html"><i class="icon fa fa-circle-o"></i> Custom Components</a></li>
            <li><a class="treeview-item" href="form-samples.html"><i class="icon fa fa-circle-o"></i> Form Samples</a></li>
            <li><a class="treeview-item" href="form-notifications.html"><i class="icon fa fa-circle-o"></i> Form Notifications</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Tables</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="table-basic.html"><i class="icon fa fa-circle-o"></i> Basic Tables</a></li>
            <li><a class="treeview-item" href="table-data-table.html"><i class="icon fa fa-circle-o"></i> Data Tables</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Pages</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="blank-page.html"><i class="icon fa fa-circle-o"></i> Blank Page</a></li>
            <li><a class="treeview-item" href="page-login.html"><i class="icon fa fa-circle-o"></i> Login Page</a></li>
            <li><a class="treeview-item" href="page-lockscreen.html"><i class="icon fa fa-circle-o"></i> Lockscreen Page</a></li>
            <li><a class="treeview-item" href="page-user.html"><i class="icon fa fa-circle-o"></i> User Page</a></li>
            <li><a class="treeview-item" href="page-invoice.html"><i class="icon fa fa-circle-o"></i> Invoice Page</a></li>
            <li><a class="treeview-item" href="page-calendar.html"><i class="icon fa fa-circle-o"></i> Calendar Page</a></li>
            <li><a class="treeview-item" href="page-mailbox.html"><i class="icon fa fa-circle-o"></i> Mailbox</a></li>
            <li><a class="treeview-item" href="page-error.html"><i class="icon fa fa-circle-o"></i> Error Page</a></li>
          </ul>
        </li>
        <li><a class="app-menu__item" href="docs.html"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Docs</span></a></li> --}}
      </ul>
    </aside>
   @yield('content')
    <!-- Essential javascripts for application to work-->
<script src="{{ asset('assests/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assests/js/popper.min.js') }}"></script>
    <script src="{{ asset('assests/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assests/js/main.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('assests/js/plugins/pace.min.js') }}"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="{{ asset('assests/js/plugins/chart.js') }}"></script>
  </script>
  <!-- Data table plugin-->
  <script type="text/javascript" src="{{ asset('assests/js/plugins/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('assests/js/plugins/dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript">$('#sampleTable').DataTable();</script>
  <!-- Sweet Alert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- select 2 dropdown -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <!-- end select 2 dropdwon-->

  <!-- Google analytics script-->
  <script type="text/javascript">
    if(document.location.hostname == 'pratikborsadiya.in') {
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-72504830-1', 'auto');
      ga('send', 'pageview');
    }
  </script>
    <script type="{{ asset('assests/javascript') }}">
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]

      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);

      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
    <!-- Google analytics script-->

    <script type="text/javascript">
         $('#mySelect2').select2({
      dropdownParent: $('#myModal')
    });
      document.getElementById("date").val($.datepicker.formatDate("dd/mm/yy", new Date()));

      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }

  </body>
</html>
