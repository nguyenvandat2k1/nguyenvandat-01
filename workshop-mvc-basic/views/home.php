<div class="row">
    <div class="col-md-6">
        <div class="text">
            <h2>Thông tin Creator: </h2>
            <ul>
                <li>Name: Thầy Đức Lucifer</li>
                <li>Email: ductv44@fpt.edu.vn</li>
                <li>Đơn vị: FPL - HN - CNTT</li>
            </ul>
        </div>
    </div>
</div>

<style>
    @keyframes type-text {
        0% {
            width: 0%;
        }

        100% {
            width: 100%;
        }
    }

    @keyframes cursor-blink {
        0% {
            border-color: transparent;
        }

        100% {
            border-color: green;
        }
    }

    .text {
        overflow: hidden;
        white-space: nowrap;
        border-right: solid 2px green;
        animation: type-text forwards 3s,
            cursor-blink .6s infinite;
        animation-timing-function: steps(20);
    }

    .text > h2 {
        font-size: 3rem;
    }

    .text > ul li {
        font-size: 2rem;
    }
</style>