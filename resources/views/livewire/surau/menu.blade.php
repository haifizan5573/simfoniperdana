<div class="row mb-2">
    <div class="col-auto text-center">
        
        <a href="{{ route('khairat')}}">
        @include('layouts.components.card_style1',[
                'image'=>"<div><img class=\"rounded avatar-sm\" src=\"assets/images/community/surau/khairat.svg\" alt=\"\" height=\"40\"></div>",
                'content'=>'<small>Khairat</small>',
                'active'=>($curpage=="khairat")?1:0
            ])
        </a>
      
    </div>
    <div class="col-auto text-center">
        
        <a href="{{ route('activities')}}">
        @include('layouts.components.card_style1',[
                'image'=>"<div><img class=\"rounded avatar-sm\" src=\"assets/images/community/surau/activities.svg\" alt=\"\" height=\"40\"></div>",
                'content'=>'<small>Activities</small>',
                'active'=>($curpage=="activities")?1:0
            ])
        </a>
     
    </div>
    <div class="col-auto text-center">
     
        <a href="#">
        @include('layouts.components.card_style1',[
                'image'=>"<div><img class=\"rounded avatar-sm\" src=\"assets/images/community/surau/fundrequest.svg\" alt=\"\" height=\"40\"></div>",
                'content'=>'<small>Fund</small>',
                'active'=>($curpage=="fund")?1:0
            ])
        </a>
       
    </div>
    <div class="col-auto text-center">
     
     <a href="{{ route('formlist') }}">
     @include('layouts.components.card_style1',[
             'image'=>"<div><img class=\"rounded avatar-sm\" src=\"assets/images/community/surau/form.svg\" alt=\"\" height=\"40\"></div>",
             'content'=>'<small>Forms</small>',
             'active'=>($curpage=="forms")?1:0
         ])
     </a>
    
   </div>
</div>