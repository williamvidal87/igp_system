<div>
  <div id="content-container">
    <div id="page-content">
    
    
    
      <div class="row">
        <div class="col-md-4">
          <div class="panel panel-warning panel-colorful media middle pad-all">
            <div class="media-left">
              <div class="pad-hor">
                <i class="fa fa-user-o icon-3x" style="font-size: 3em;"></i>
              </div>
            </div>
            <div class="media-body">
              <p class="text-2x mar-no text-semibold">{{ count($AdminData) }}</p>
              <p class="mar-no">User</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="panel panel-info panel-colorful media middle pad-all">
            <div class="media-left">
              <div class="pad-hor">
                <i class="fa fa-university icon-3x" style="font-size: 3em;"></i>
              </div>
            </div>
            <div class="media-body">
              <p class="text-2x mar-no text-semibold">{{ count($FacilitiesData) }}</p>
              <p class="mar-no">Facilities</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="panel panel-mint panel-colorful media middle pad-all">
            <div class="media-left">
              <div class="pad-hor">
                <i class="fa fa-wrench icon-3x" style="font-size: 3em;"></i>
              </div>
            </div>
            <div class="media-body">
              <p class="text-2x mar-no text-semibold">{{ count($EquipmentData) }}</p>
              <p class="mar-no">Equipment</p>
            </div>
          </div>
        </div>
      </div>
    
    
    
    
    
      <div class="panel">
        <h3 class="panel-title">School Facilities</h3>
        <div class="pad-all">
          <div id="demo-gallery" style="display:none;">
            
            @foreach($FacilitiesData as $facilitiesdata)
              <?php
                $facilitiesdata->image=json_decode($facilitiesdata->image , true);
              ?>
              @foreach($facilitiesdata->image as $DATA)
                <a href="#">
                  <img alt="{{ $facilitiesdata->facility }}" src="/storage/{{ $DATA }}" data-image="/storage/{{ $DATA }}" data-description="{{ $facilitiesdata->facility }}" style="display:none">
                </a>
              @endforeach
              
            @endforeach
          </div>
        </div>
      </div>
      
      
      
      
      
      
      
      
    </div>
  </div>
</div>