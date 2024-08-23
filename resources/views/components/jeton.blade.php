@props(["valeur"=>null,"size"=>80,"ftSize"=>null,"fvSize"=>null])

<style>
  .coin-container {
    display: flex;
    justify-content: center;
    align-items: center;
    /* width: {{  $size }}px;
    height: {{  $size }}px; */
  }

  .coin {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background-color: #E5A01D;
    position: relative;
  }

  .coin svg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }

  .center-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    font-size: {{$ftSize}}px;
    font-weight: bold;
    line-height: 1.2;
    color: #096A09;
  }

  .coin .value {
    display: block;
    font-size: {{$fvSize}}px;
    color: #096A09;
  }
</style>




  <div class="coin-container" style="width: {{$size}};
  height:{{$size}};">
    <div class="coin">
      <svg viewBox="0 0 100 100">
        <path id="curve" d="M 50, 50 m -45, 0 a 45,45 0 1,1 90,0 a 45,45 0 1,1 -90,0" fill="transparent"/>
        <text width="100">
          <textPath href="#curve" startOffset="0%" text-anchor="middle" font-size="6" font-family="Arial" letter-spacing="1px">
            Green detox &bull;
             Green detox &bull; 
             Green detox &bull; 
             Green detox &bull;
             Green detox &bull;
             Green detox &bull; 
             Green detox &bull; 
             Green detox &bull;
             Green detox &bull;
             Green detox &bull; 
             Green detox &bull;
             Green detox &bull; 
             Green detox &bull; 
             Green detox &bull;
             Green detox &bull;
             Green detox &bull; 
             Green detox &bull; 
             Green detox &bull;
          </textPath>
        </text>
      </svg>
      <div class="center-text" style="font-size: {{$ftSize}};">
        <span>Gr<span style="color:red;">ee</span>n</span><br>
        <span class="value" style="{{$fvSize}};">{{$valeur}}</span>
      </div>
    </div>
  </div>

