<?php
if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
    http_response_code(403);
    exit;
}
echo '
       
    <div class="container border border-success rounded my-5 " >
      <div class="row text-center">
        <div class="col-4 w-100">
          <h1 class="text-uppercase my-5">Cacti-Succulent Kuching</h1>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class=" col-4 fs-4 w-75 my-5 ">
          <p> Cacti-Succulent Kuching is a local homegrown business specialized in selling various 
            type and size of succulent plants. Apart from selling succulent plants, we also sell different type 
            of gardening tools, soils and fertilizers at an affordable cost. Cacti-Succulent Kuching is setup in 
            2020  in  which  business  is  running  both  at  home  as  well  as  weekend  market.  Our  primary  
            mission  is  to  establish  a  long-lasting  relationship  of  trust  and  commitment  with  each  visitor 
            through providing the highest level of customer service.</p>
        </div>
      </div>
    </div>
    
';

?>