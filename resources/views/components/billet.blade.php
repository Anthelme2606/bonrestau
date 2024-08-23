 @props(['valeur'=>null])
 <style>
    .custom-container {
      width: 120px;
      height: 250px;
      border: none;
      box-shadow: 0 4px 8px rgba(0, 0.2, 0, 0.2);
      background-color: #E5A01D;
      position: relative;
      display: flex;
      justify-content: space-between;
      font-size: 0.75rem;
      overflow: hidden;
      padding: 10px; 
    }
    .top-text,
    .bottom-text {
      position: absolute;
      left: 10px;
      right: 10px;
      text-align: center;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
    }
    .top-text {
      top: -8px;
      font-size: 10px;
      padding-top: 5px; 
    }
    .bottom-text {
      font-size: 10px;
      bottom: -8px;
      padding-bottom: 5px; 
    }
    .vertical-text-left,
    .vertical-text-right {
      position: absolute;
      top: 20px;
      bottom: 20px;
      display: flex;
      align-items: center;
      text-align: center;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
    }
    .vertical-text-left {
      font-size: 10px;
      left: -4px;
      padding-left: 5px;
      transform: rotate(180deg);
      writing-mode: vertical-lr;
      text-orientation: mixed;
    }
    .vertical-text-right {
      font-size: 10px;
      right: -4px;
      padding-right: 5px;
      writing-mode: vertical-lr;
      text-orientation: mixed;
    }
    .center-text-container {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100%;
      width: 100%;
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
    }
    .center-text {
      font-size: 24px;
      color: green;
    }
    .center-text .red {
      color: red;
    }
    .center-text .green {
        text-align:center;
      color: green;
    }
  </style>
</head>
<body>

<div class="custom-container">
  <!-- Texte horizontal en haut -->
  <div class="top-text">
    Green detox &bull;
    Green detox &bull; 
    Green detox &bull; 
    Green detox &bull;
    Green detox &bull;
    Green detox &bull; 
    Green detox &bull;
  </div>

  <!-- Texte vertical à gauche -->
  <div class="vertical-text-left">
    Green detox &bull;
    Green detox &bull; 
    Green detox &bull; 
    Green detox &bull;
    Green detox &bull;
    Green detox &bull; 
    Green detox &bull;
  </div>

  <!-- Texte vertical à droite -->
  <div class="vertical-text-right">
    Green detox &bull;
    Green detox &bull; 
    Green detox &bull; 
    Green detox &bull;
    Green detox &bull;
    Green detox &bull; 
    Green detox &bull;
  </div>

  <!-- Texte horizontal en bas -->
  <div class="bottom-text">
    Green detox &bull;
    Green detox &bull; 
    Green detox &bull; 
    Green detox &bull;
    Green detox &bull;
    Green detox &bull; 
    Green detox &bull;
  </div>

  <!-- Centered Text -->
  <div class="center-text-container">
    <div class="center-text">
      <span class="green">Gr</span><span class="red">ee</span><span class="green">n</span><br>
      <span class="green">{{$valeur}}</span>
    </div>
  </div>
  
</div>


