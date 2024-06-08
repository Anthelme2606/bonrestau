
    <style>
        form {
            border:none;
            outline:none;
        }
        form input {
            border:none;
            outline:none;
        }
    </style>
<div class="container mt-5">
    <h1>Transactions</h1>
    <!-- Modal -->
    <div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="transactionModalLabel">Create Transaction</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="transactionForm" action="{{route('trans-store')}}" method="POST">
                        @csrf
                        @method("POST")
                        <div class="mb-3">
                            <label for="user_code" class="form-label">User code</label>
                            <input type="text" class="form-control" id="user_code" name="user_code" required>
                        </div>
                        <div class="mb-3">
                            <label for="coupon_code" class="form-label">Coupon code</label>
                            <input type="text" class="form-control" id="coupon_code" name="coupon_code" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" step="0.01" class="form-control" id="amount" name="amount"readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="percent" class="form-label">Gain percent(%)</label>
                            <input type="number" step="0.01" class="form-control" id="percent" value="5" name="percent" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="transactionForm">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>