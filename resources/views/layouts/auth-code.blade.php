<style>
     .fixed-code-badge {
            position: fixed;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            width: 120px;
            height: 120px;
           
            color: white;
            border-radius: 50%;
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175);
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
    .fixed-code-badge .code-icon {
        font-size: 22px;
        color: #50a728;
    }
    .fixed-code-badge .code-text {
        margin-top: 10px;
    }
    .rotating-dot {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 10px;
            height: 10px;
            background-color: #28a745;
            border-radius: 50%;
            animation: rotate 5s linear infinite;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg) translateX(80px) rotate(0deg);
            }
            100% {
                transform: rotate(360deg) translateX(80px) rotate(-360deg);
            }
        }
</style>

<div class="fixed-code-badge bg-dark">
    <div>
        <span class="material-icons code-icon mdi mdi-lock"></span>
        <div class="code-text">{{Auth::user()->referral_code}}</div>
    </div>
    <div class="rotating-dot"></div>
</div>
