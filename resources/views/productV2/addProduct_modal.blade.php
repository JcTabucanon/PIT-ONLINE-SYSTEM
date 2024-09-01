<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createProduct">
                    <div class="mb-3">
                        <label for="product-name" class="form-label">Product Name:</label>
                        <input type="text" class="form-control" id="product-name" name="product-name" value="{{ old('product-name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="product-price" class="form-label">Price:</label>
                        <input type="text" class="form-control" id="product-price" name="product-price" value="{{ old('product-price') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="product-description" class="form-label">Description:</label>
                        <textarea class="form-control" id="product-description" name="product-description" required>{{ old('product-description') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Product</button>
                </form>
            </div>
        </div>
    </div>
</div>