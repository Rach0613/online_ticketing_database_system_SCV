@extends('layout')

@section('content')
<div class="safe">
    <div class="container progress-container1">
        <div class="progress-bar1">
            <div class="progress-step1 active1">
                <div class="step-circle1">1</div>
                <div class="step-label1">Select Seat</div>
            </div>
            <div class="progress-step1">
                <div class="step-circle1">2</div>
                <div class="step-label1">Confirmation</div>
            </div>
            <div class="progress-step1">
                <div class="step-circle1">3</div>
                <div class="step-label1">Payment</div>
            </div>
        </div>
    </div>

    <div class="show-info">
        <h1 class="show-title">Culture Show</h1>
        <div class="show-details">
            <p>Date: {{ $timedate['date'] }}</p>
            <p>Time: {{ ucfirst($timedate['slot']) }}</p>
        </div>
    </div>

    <form action="{{ route('ticket.select_seat.store') }}" method="POST">
        @csrf
        <div class="seating-container col">
            <div class="stage">STAGE</div>
            <div class="seats">
                <div class="seat-numbers">
                    <div></div>
                    @for ($i = 1; $i <= 12; $i++) {{-- Adjust to 12 seats per row --}}
                        <div>{{ $i }}</div>
                    @endfor
                    <div></div>
                </div>
                @foreach ($seats->groupBy('row') as $row => $seatRow)
                    <div class="row">
                        <div class="row-label">{{ $row }}</div>
                        @foreach ($seatRow as $seat)
                            <div class="seat {{ $seat->status }}">
                                <input type="checkbox" name="seats[]" value="{{ $seat->id }}" id="seat-{{ $seat->id }}" 
                                    {{ $seat->status === 'sold' ? 'disabled' : '' }} hidden>
                                <label for="seat-{{ $seat->id }}"></label>
                            </div>
                        @endforeach
                        <div class="row-label">{{ $row }}</div>
                    </div>
                @endforeach
            </div>

            <div class="legend">
                <div class="legend-item">
                    <div class="legend-dot" style="background: #666"></div>
                    <span>Available</span>
                </div>
                <div class="legend-item">
                    <div class="legend-dot" style="background: #4CAF50"></div>
                    <span>Selected</span>
                </div>
                <div class="legend-item">
                    <div class="legend-dot" style="background: #f44336"></div>
                    <span>Sold</span>
                </div>
            </div>

            <p class="text">You have selected <span id="count">0</span> seats.</p>

            <button type="submit" class="book-button">Book Seat</button>
                        <!-- Display Validation Errors -->
                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
        
                    {{-- Display Validation Errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const seats = document.querySelectorAll('.seat input[type="checkbox"]');
    const countDisplay = document.getElementById('count');
    const maxSeats = {{ $timedate['adults'] + $timedate['children'] }};

    function updateSelectedCount() {
        const selectedSeats = document.querySelectorAll('.seat input[type="checkbox"]:checked');
        countDisplay.textContent = selectedSeats.length;

        if (selectedSeats.length >= maxSeats) {
            seats.forEach(seat => {
                if (!seat.checked) {
                    seat.disabled = true;
                }
            });
        } else {
            seats.forEach(seat => {
                if (!seat.classList.contains('sold')) {
                    seat.disabled = false;
                }
            });
        }
    }

    seats.forEach(seat => {
        seat.addEventListener('change', function () {
            if (this.checked) {
                this.closest('.seat').classList.add('selected');
            } else {
                this.closest('.seat').classList.remove('selected');
            }
            updateSelectedCount();
        });
    });

    updateSelectedCount();
});
</script>
@endsection


@push('seat_styles')
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('{{ asset("images/IMG_5588 (1).JPG") }}');
    background-size: cover;
    color: white;
    height: 100%;
    width: 100%;
}

.progress-container1 {
    max-width: 800px;
    margin: 2rem auto;
    margin-top: 0;
    padding: 2rem 1rem;
    position: relative;
    background:rgba(0, 0, 0, 0.5);
    background-size: cover;
    background-position: center;
    border-radius: 10px;
    overflow: hidden;
}

.progress-container1::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    backdrop-filter: blur(5px);
    z-index: 1;
}

.progress-bar1 {
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    padding: 0 20px;
    z-index: 2;
}

.progress-bar1::before {
    content: '';
    position: absolute;
    background: #666;
    height: 2px;
    width: calc(100% - 40px);
    top: 15px;
    z-index: 1;
    left: 20px;
}

.progress-step1 {
    text-align: center;
    z-index: 2;
    position: relative;
}

.step-circle1 {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: #333;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

.progress-step1.active1 .step-circle1 {
    background: #4CAF50;
}

.step-label1 {
    font-size: 0.9rem;
    color: #fff;
    position: absolute;
    width: 100px;
    text-align: center;
    left: 50%;
    transform: translateX(-50%);
    top: 35px;
    white-space: nowrap;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
}

.progress-step1.active1 .step-label1 {
    color: #4CAF50;
    font-weight: bold;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);
}

.show-info {
    text-align: center;
    margin: 2rem 0;
}

.show-title {
    font-size: 2rem;
    margin-bottom: 1rem;
}

.show-details {
    font-size: 1.2rem;
    color: #ccc;
}

.seating-container {
    max-width: 900px;
    margin: 2rem auto;
    padding: 2rem;
    background: rgba(0, 0, 0, 0.5);
    border-radius: 10px;
}

.stage {
    height: 50px;
    background: #444;
    border-radius: 100px 100px 0 0;
    margin-bottom: 3rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
}

.seats {
    display: grid;
    gap: 0.5rem;
    justify-content: center;
}

.seat input[type="checkbox"] {
    display: block !important;
    background: yellow;
    border: 1px solid red;
}


.seat-numbers {
    display: grid;
    grid-template-columns: 2rem repeat(12, 1fr) 2rem;
    gap: 0.5rem;
    margin-bottom: 1rem;
    text-align: center;
}

.row {
    display: grid;
    grid-template-columns: 2rem repeat(12, 1fr) 2rem;
    gap: 0.5rem;
    align-items: center;
}

.row-label {
    font-weight: bold;
    text-align: center;
}

.seat {
    width: 25px;
    height: 25px;
    background: #666;
    border-radius: 8px 8px 0 0;
    cursor: pointer;
    margin: 0 auto;
}

.seat:hover {
    background: #888;
}

.seat.selected {
    background: green !important; 
    border: 2px solid yellow !important;
}


.seat.sold {
    background: #f44336;
    cursor: not-allowed;
}

.book-button {
    display: block;
    width: 200px;
    margin: 2rem auto;
    padding: 1rem;
    background: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1.1rem;
}

.book-button:hover {
    background: #45a049;
}

.legend {
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin-top: 2rem;
}

.legend-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.legend-dot {
    width: 15px;
    height: 15px;
    border-radius: 4px 4px 0 0;
}

.text {
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin-top: 8rem;
}
    
p.text {
    margin: 20px;
}

p.text span {
    color: #0081cb;
    font-weight: 600;
    box-sizing: content-box;
}

/* Responsive styling */
@media (max-width: 768px) {
    .progress-container1 {
        padding: 1rem 0.5rem;
        max-width: 100%;
    }

    .progress-bar1 {
        display: flex;
        justify-content: space-between;
        padding: 0 10px 10px 10px;
        margin: 1vh;
    }

    .step-circle1 {
        width: 25px;
        height: 25px;
        font-size: 0.8rem;
    }

    .step-label1 {
        font-size: 0.7rem;
        white-space: nowrap;
    }

    .progress-bar1::before {
        left: 12.5px;
        width: calc(100% - 25px);
    }

    .row-label {
        font-size: 0.7rem; /* Adjust font size */
        margin: 0; /* Reduce margin */
    }

    .seat-numbers,
    .row {
        grid-template-columns: 1rem repeat(12, 1fr) 1rem; /* Shrink the labels */
    }
}

@media (max-width: 768px) {
    .seating-container {
        padding: 1rem;
        max-width: 100%;
        margin: 1vh;
    }

    .seats {
        gap: 0.3rem;
        margin: 1vh;
    }

    .seat {
        width: 20px;
        height: 20px;
    }

    .seat-numbers,
    .row {
        grid-template-columns: 1.5rem repeat(12, 1fr) 1.5rem;
        gap: 0.3rem;
    }

    .show-info {
        margin: 1rem 0;
    }

    .show-title {
        font-size: 1.5rem;
    }

    .show-details {
        font-size: 1rem;
    }

    .book-button {
        width: 150px;
        padding: 0.8rem;
        font-size: 1rem;
    }

    .legend {
        flex-direction: column;
        gap: 1rem;
        margin-top: 1rem;
    }

    p.text {
        margin: 10px;
        font-size: 0.9rem;
    }
}
.safe{
        margin: 2vw 2vh 2vw 2vh;
    }
</style>
@endpush