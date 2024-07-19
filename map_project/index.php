<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>web_gis</title>
    <!-- CSS only -->
    <link href="libs/bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- JavaScript Bundle with Popper -->
    <script src="libs/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="libs/jquery.js"></script>
    <script src="libs/v6.13.0-dist/ol.js"></script>
    <link rel="stylesheet" href="libs/v6.13.0-dist/ol.css">
    <script src="libs/ol-layerswitcher-master/dist/ol-layerswitcher.js"></script>
    <link rel="stylesheet" href="libs/ol-layerswitcher-master/dist/ol-layerswitcher.css" />
    <script src="libs/ol-geocoder/ol-geocoder.js"></script>
    <link rel="stylesheet" href="libs/ol-geocoder/ol-geocoder.css" />
    <script src="libs/ol-popup/ol-popup.js"></script>
    <link rel="stylesheet" href="libs/ol-popup/ol-popup.css" />
    <link rel="stylesheet" href="libs/jquery-ui-1.12.1/jquery-ui.css">
    <script src="libs/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
    <script src="libs/jquery-ui-1.12.1/jquery-ui.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>

    

  </head>

<body>
    <div id="top-bar">
        <div id="title">ASSAM STATE SPACE APPLICATION CENTRE</div>
        <button onclick="show_hide_querypanel()" type="button" id="query_panel_btn" class="btn btn-success btn-sm">☰</button>
    </div>
     
    <div id="map" class="map">
    <button id="print-map-btn"  class="material-icons">print</button>
    
    <div class="modal fade" id="printModal" tabindex="-1" aria-labelledby="printModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="printModalLabel">Print Map</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="format">Page size</label>
                            <select id="format" class="form-control">
                                <option value="a0">A0 (slow)</option>
                                <option value="a1">A1</option>
                                <option value="a2">A2</option>
                                <option value="a3">A3</option>
                                <option value="a4" selected>A4</option>
                                <option value="a5">A5 (fast)</option>
                            </select>
                            <label for="resolution">Resolution</label>
                            <select id="resolution" class="form-control">
                                <option value="72">72 dpi (fast)</option>
                                <option value="150">150 dpi</option>
                                <option value="300">300 dpi (slow)</option>
                            </select>
                        </div>
                        <button id="ziButton" type="button" class="btn btn-secondary">Select Area</button>
                        <button id="export-pdf" type="button" class="btn btn-primary">Export PDF</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <div id="scale_bar">
            
            
        </div>

       

        <button id="trackBtn">
            <i class="material-icons">location_searching</i>
        </button>
        

       
     
        <!-- <div id="scale_bar1"></div> -->
        <button onclick="wms_layers()" type="button" id="wms_layers_btn" ><i class="material-icons">
            event_available
            </i></button>
       
        <button onclick="clear_all()" type="button" id="clear_btn" ><i class="material-icons">home</i></button>
        <button onclick="toggleFullScreen()" type="button" id="full-screen-btn" >
            <i class="material-icons">fullscreen</i>
        </button>

        <select id="measuretype" class="form-select" aria-label=".form-select-sm example">
            <option value="select">Select Measure option</option>
            <option value="length">Length (LineString)</option>
            <option value="area">Area (Polygon)</option>
            <option value="clear">Clear Measurement</option>
        </select>
<button id="trackbtn2"  class="material-icons">pin_drop</button>
        <div>

        <div class="modal fade" id="pinModal" tabindex="-1" aria-labelledby="pinModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pinModalLabel">Pin_drop</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                        <label for="lat">Latitude:</label>
                        <input type="text" id="lat" class="form-control" placeholder="Enter latitude">
                        </div>
                        <label for="lon">Longitude:</label>
                        <input type="text" id="lon" class="form-control" placeholder="Enter longitude">
                         </div>
                         <button id="locate_Pindrop" class="btn btn-success">Drop Pin</button>
                         <button id="locate_Pinremove" class="btn btn-danger">Remove Pin</button>
                         </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <div>
   
</div>

<div class="btn-group1">
    <button type="button"  id="layer-btn"  data-bs-toggle="dropdown" aria-expanded="false">
        <i class="material-icons">layers</i>
    </button>
    <ul class="dropdown-menu" id="layer-dropdown">
        <li><a class="dropdown-item" href="#" data-layer="Country">Layer Country</a></li>
        <li><a class="dropdown-item" href="#" data-layer="State">Layer State</a></li>
        <li><a class="dropdown-item" href="#" data-layer="District">Layer District</a></li>
        <li><a class="dropdown-item" href="#" data-layer="Village">Layer Village</a></li>
    </ul>
     </div>
       
        <div id="legend"></div>
        <button onclick="show_hide_legend()" type="button" id="legend_btn" class="btn btn-success btn-sm">☰ Show Legend</button>
        <button onclick="info()" type="button" id="info_btn" class="btn btn-success btn-sm">
  <span class="material-icons">info</span> <!-- Google Font icon for information -->
</button>
       
         <div class="icon-container">
        <span class="material-icons icon" onclick="toggleInputs()">add_location</span>
        <div class="icon-content" id="iconContent">
            Latitude: <input type="text" id="latitudeInput"><br>
            Longitude: <input type="text" id="longitudeInput"><br>
            <button onclick="dropPin()">Drop Pin</button>
        </div>
    </div>

          <!-- Button to trigger the dropdown -->
            <!-- Measure Options as an icon button with dropdown -->
        <!--<div class="btn-group">
            <button type="button"  data-bs-toggle="dropdown" aria-expanded="false">
                <i class="material-icons">straighten</i>
            </button>
            <ul class="dropdown-menu measure-dropdown">
                <li><a class="dropdown-item" href=''>Length (LineString)</a></li>
                <li><a class="dropdown-item" href=''>Area (Polygon)</a></li>
                <li><a class="dropdown-item" href=''>Clear Measurement</a></li>
            </ul>
        </div> -->
        </div>
    </div>




    <div id="query_tab">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-attributes-tab" data-bs-toggle="tab" data-bs-target="#nav-attributes" type="button" role="tab" aria-controls="nav-attributes" aria-selected="true">By Attributes</button>
                <button class="nav-link" id="nav-draw-tab" data-bs-toggle="tab" data-bs-target="#nav-draw" type="button" role="tab" aria-controls="nav-draw" aria-selected="false">By Draw</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-attributes" role="tabpanel" aria-labelledby="nav-attributes-tab">
                <label for="layer"><b>&nbsp;Select Layer</b></label>
                <select id="layer" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>Select Layer</option>
                </select>
                <br>
                <label for="attributes"><b>&nbsp;Select Attribute</b></label>
                <select id="attributes" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>Select Attribute</option>
                </select>
                <br>
                <label for="operator"><b>&nbsp;Select Operator</b></label>
                &nbsp;<select id="operator" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>Select Operator</option>
                </select>
                <br>
                <label for="value">&nbsp;Enter Value</label>
                <input type="text" class="form-control form-select-sm" id="value" name="value">
                <br>
                &nbsp;<button onclick="query()" type="button" class="btn btn-danger btn-sm">Load Layer</button>

            </div>
            <div class="tab-pane fade" id="nav-draw" role="tabpanel" aria-labelledby="nav-draw-tab">
                <label for="layer1"><b>&nbsp;Select Layer</b></label>
                <select id="layer1" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>Select Layer</option>
                </select>
                <br>
                <label for="draw_type"><b>&nbsp;Select Geometry Type</b></label>
                <select id="draw_type" class="form-select form-select-sm" aria-label=".form-select-sm example">

                <option value="select">&nbsp;Select Shape</option>
                    <option value="Square">Square</option>
                    <option value="Box">Box</option>
                    <option value="Polygon">Polygon</option>
                    <option value="Star">Star</option>
                    <option value="clear">Clear</option>
                </select>


            </div>

        </div>

    </div>


    <div id="table_data" style="font-size:15px;"></div>
    <!-- Scrollable modal -->

    <div class="modal fade" id="wms_layers_window" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Available WMS Layers</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table id="table_wms_layers" class="table table-hover" style="font-size:15px;">
                    </table>
                </div>
                <div class="modal-footer">
                    <button onclick="close_wms_window()" type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button onclick="add_layer()" type="button" id="add_map_btn" class="btn btn-primary btn-sm">Add Layer to Map</button>
                </div>
            </div>
        </div>
    </div>

    <!--attribute query-->

    <div class ="attQueryDiv" id="attQueryDiv">
        <div class ="headerDiv" id="headerDiv">
            <label for ="">Attribute query</label>
  </div><br>
  <label for ="">Select Layer</label>
  <select name ="selectLayer" id="selectLayer">
    </select><br><br>

    <label for ="">Select Attribute</label>
  <select name ="selectAttribute" id="selectAttribute">
    </select><br><br>

    <label for ="">Select Operator</label>
  <select name ="selectOperator" id="selectOperator">
    </select><br><br>

    <label for ="">Enter Value</label>
  <input type ="text" name="enterValue" id="enterValue">
    </select><br><br>

    <button type="button" id="attQryRun" class="attQryRun" onclick="attributeQuery()">Run</button>
    </div>
    <script src="main.js"></script>
    <!-- <script src="print.js"></script> -->
    <!-- <script src="droppin.js"></script> -->
   
   
</body>

</html>