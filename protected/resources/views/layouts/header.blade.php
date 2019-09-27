<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WEB IMIGRASI | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- <link rel="stylesheet" href="{{ asset('components/bootstrap/dist/css/bootstrap.min.css') }}"> -->
  <!-- Bootstrap 3.3.7 -->
  {!! Html::style('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
  <!-- Font Awesome -->
  {!! Html::style('assets/bower_components/font-awesome/css/font-awesome.min.css') !!}
  <!-- Ionicons -->
  {!! Html::style('assets/bower_components/Ionicons/css/ionicons.min.css') !!}
  <!-- Theme style -->
  {!! Html::style('assets/dist/css/AdminLTE.css') !!}
  
  {!! Html::style('assets/dist/css/simpleIcon.css') !!}
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <!-- <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css"> -->
  {!! Html::style('assets/dist/css/skins/custom_skin.css') !!}
  <!-- Morris chart -->
  {!! Html::style('assets/bower_components/morris.js/morris.css') !!}
  <!-- jvectormap -->
  {!! Html::style('assets/bower_components/jvectormap/jquery-jvectormap.css') !!}
  <!-- Date Picker -->
  {!! Html::style('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}
  <!-- Daterange picker -->
  {!! Html::style('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') !!}
  <!-- bootstrap wysihtml5 - text editor -->
  {!! Html::style('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}
  <!-- DataTables -->
  {!! Html::style('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
  {!! Html::style('assets/plugins/select2/select2.min.css') !!}

  <!-- Alert -->
  {!! Html::style('assets/plugins/jquery-alert/css/jquery-confirm.css') !!}

  <!-- summernote -->
  {!! Html::style('assets/plugins/summernote/summernote.css') !!}



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
    .main-sidebar:before {
      display: block;
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      z-index: 2;
    }
    .main-sidebar:after {

    display: block;
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    z-index: 2;

}
.main-sidebar:after {

    content: '';
    background: linear-gradient(to bottom, #0026e3 0%, #07003e 50%);
        background-size: auto;
    background-size: auto;
    background-size: 150% 150%;
    z-index: 3;
    opacity: 0.9;

}
/** sorting*/
    ol {
      margin: 0;
      padding: 0;
      padding-left: 30px;
    }

    ol.sortable, ol.sortable ol {
      margin: 0 0 0 25px;
      padding: 0;
      list-style-type: none;
    }

    ol.sortable {
      margin: 0;
    }

    .sortable li {
      margin: 5px 0 0 0;
      padding: 0;
    }

    .sortable li div  {
      border: 1px solid #d4d4d4;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 3px;
      border-color: #D4D4D4 #D4D4D4 #BCBCBC;
      padding: 6px;
      margin: 0;
      cursor: move;
      background: #fff;
      /*background: -moz-linear-gradient(top,  #ffffff 0%, #f6f6f6 47%, #ededed 100%);
      background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(47%,#f6f6f6), color-stop(100%,#ededed));
      background: -webkit-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#ededed 100%);
      background: -o-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#ededed 100%);
      background: -ms-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#ededed 100%);
      background: linear-gradient(to bottom,  #ffffff 0%,#f6f6f6 47%,#ededed 100%);*/
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed',GradientType=0 );
    }

    .sortable li.mjs-nestedSortable-branch div {
      background: -moz-linear-gradient(top,  #ffffff 0%, #f6f6f6 47%, #f0ece9 100%);
      background: -webkit-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#f0ece9 100%);

    }

    .sortable li.mjs-nestedSortable-leaf div {
      background: -moz-linear-gradient(top,  #ffffff 0%, #f6f6f6 47%, #bcccbc 100%);
      background: -webkit-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#bcccbc 100%);

    }

    li.mjs-nestedSortable-collapsed.mjs-nestedSortable-hovering div {
      border-color: #999;
      background: #fafafa;
    }

    .disclose {
      cursor: pointer;
      width: 10px;
      display: none;
    }

    .sortable li.mjs-nestedSortable-collapsed > ol {
      display: none;
    }

    .sortable li.mjs-nestedSortable-branch > div > .disclose {
      display: inline-block;
    }

    .sortable li.mjs-nestedSortable-collapsed > div > .disclose > span:before {
      content: '+ ';
    }

    .sortable li.mjs-nestedSortable-expanded > div > .disclose > span:before {
      content: '- ';
    }
     .switch {
          position: relative;
          display: inline-block;
          width: 56px;
          height: 26px;
        }

        /* Hide default HTML checkbox */
        .switch input {display:none;}
     /* The slider */
        .slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ccc;
          -webkit-transition: .4s;
          transition: .4s;
          border-radius: 50px;
        }

        .slider:before {
          position: absolute;
          content: "";
          height: 18px;
          width: 22px;
          left: 4px;
          bottom: 4px;
          background-color: white;
          -webkit-transition: .4s;
          transition: .4s;
          border-radius: 50px;
        }

        input:checked + .slider {
          background-color: #161CAE;
        }

        input:focus + .slider {
          box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
          -webkit-transform: translateX(26px);
          -ms-transform: translateX(26px);
          transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
          border-radius: 34px;
        }

        .slider.round:before {
          border-radius: 50%;
        }


        .toggle {
          position: relative;
          display: block;
          width: 40px;
          height: 20px;
          cursor: pointer;
          -webkit-tap-highlight-color: transparent;
          transform: translate3d(0, 0, 0);
        }
        .toggle:before {
          content: "";
          position: relative;
          top: 3px;
          left: 3px;
          width: 34px;
          height: 14px;
          display: block;
          background: #9A9999;
          border-radius: 8px;
          transition: background 0.2s ease;
        }
        .toggle span {
          position: absolute;
          top: 0;
          left: 0;
          width: 20px;
          height: 20px;
          display: block;
          background: white;
          border-radius: 10px;
          box-shadow: 0 3px 8px rgba(154, 153, 153, 0.5);
          transition: all 0.2s ease;
        }
        .toggle span:before {
          content: "";
          position: absolute;
          display: block;
          margin: -18px;
          width: 56px;
          height: 56px;
          background: rgba(237, 237, 237, 0.5);
          border-radius: 50%;
          transform: scale(0);
          opacity: 1;
          pointer-events: none;
        }

        #cbx:checked + .toggle:before {
          background: #3c8dbc;
        }
        #cbx:checked + .toggle span {
          background: #fff;
          transform: translateX(20px);
          transition: all 0.2s cubic-bezier(0.8, 0.4, 0.3, 1.25), background 0.15s ease;
          box-shadow: 0 3px 8px rgba(154, 153, 153, 0.5);
        }
        #cbx:checked + .toggle span:before {
          transform: scale(1);
          opacity: 0;
          transition: all 0.4s ease;
        }




        /*slider baru*/

        /*foto*/
        
    .btn-foto{
      background: #000000;
      padding: 5px;
      color: #FFFFFF;
      cursor: pointer;
      -webkit-transition: all 0.3s ease-in-out;
      -moz-transition: all 0.3s ease-in-out;
      -o-transition: all 0.3s ease-in-out;
      -ms-transition: all 0.3s ease-in-out;
      transition: all 0.3s ease-in-out;
    }

    .btn-foto-bg{
      background-color:rgba(0,0,0,0.5) !important;
      top: 0px !important;
    }

    .positionStatic{
      position: static !important;
    }

    .foto_btn_edit{
        background-color:rgba(0,0,0,0.5) !important;
        display: inline-block;
        font-style: normal;
        font-weight: normal;
        position: absolute;
        text-align: center;
        width: 100%;
        bottom: 0;
    }
  </style>
</head>