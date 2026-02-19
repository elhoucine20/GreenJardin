<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #008a27 0%, #6B8E23 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 600px;
            padding: 40px;
        }

        h1 {
            color: #333;
            margin-bottom: 10px;
            font-size: 28px;
        }

        .subtitle {
            color: #666;
            margin-bottom: 30px;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        label {
            display: block;
            color: #333;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
        }

        label .required {
            color: #e74c3c;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        select,
        textarea {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #6B8E23;
            box-shadow: 0 0 0 3px rgba(107, 142, 35, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        input[type="file"] {
            padding: 10px;
            cursor: pointer;
        }

        input[type="file"]::file-selector-button {
            background: #8B7355;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            margin-right: 12px;
            transition: background 0.3s ease;
        }

        input[type="file"]::file-selector-button:hover {
            background: #6F5B43;
        }

        .image-preview {
            margin-top: 12px;
            display: none;
        }

        .image-preview img {
            max-width: 200px;
            max-height: 200px;
            border-radius: 8px;
            border: 2px solid #e0e0e0;
        }

        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 32px;
        }

        button {
            flex: 1;
            padding: 14px 24px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: #6B8E23;
            color: white;
        }

        .btn-primary:hover {
            background: #556B1E;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(107, 142, 35, 0.4);
        }

        .btn-secondary {
            background: #f5f5f5;
            color: #333;
        }

        .btn-secondary:hover {
            background: #e0e0e0;
        }

        .helper-text {
            font-size: 12px;
            color: #666;
            margin-top: 4px;
        }

        @media (max-width: 640px) {
            .container {
                padding: 24px;
            }

            h1 {
                font-size: 24px;
            }

            .button-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create New Product</h1>
        <p class="subtitle">Fill in the details below to add a new product</p>

        <form id="productForm" action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">
                    Product Name <span class="required">*</span>
                </label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    placeholder="Enter product name"
                    required
                >
                @error('name')
                <div style="color: #e74c3c;">{{$message}}
                </div>
                    
                @enderror
            </div>

            <div class="form-group">
                <label for="price">
                    Price <span class="required">*</span>
                </label>
                <input 
                    type="number" 
                    id="price" 
                    name="prix" 
                    placeholder="0.00"
                    step="0.01"
                    min="0"
                    required
                >
                
                <div class="helper-text">Enter the price in your currency</div>
            </div>

            <div class="form-group">
                <label for="description">
                    Description <span class="required">*</span>
                </label>
                <textarea 
                    id="description" 
                    name="description" 
                    placeholder="Enter product description"
                    required
                ></textarea>
                                @error('description')
                <div style="color: #e74c3c;">{{$message}}
                </div>
                    
                @enderror
            </div>

            <div class="form-group">
                <label for="image">
                    Product Image <span class="required">*</span>
                </label>
                <input 
                    type="file" 
                    id="image" 
                    name="image" 
                    accept="image/*"
                    required
                >
                <div class="image-preview" id="imagePreview">
                    <img id="previewImg" src="" alt="Preview">
                </div>
            </div>

            <div class="form-group">
                <label for="categorie_id">
                    Category <span class="required">*</span>
                </label>
                <select id="categorie_id" name="categorie_id" required>
                    <option value="">Select a category</option>
                    <option value="1">plantes</option>
                    <option value="2">graines</option>
                    <option value="3">outils</option>
                </select>
            </div>

            <div class="button-group">
                <a href="{{route('Dashbord-Admin')}}">

                    <button  type="button" class="btn-secondary">Cancel</button>
                </a>

                <button type="submit" name="submit" class="btn-primary">Create Product</button>
            </div>
        </form>
    </div>

    <!-- <script>
        // Image preview functionality
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImg').src = e.target.result;
                    document.getElementById('imagePreview').style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });

        // Form submission
        document.getElementById('productForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(this);
            
            // Convert to object for display (in real app, send to backend)
            const productData = {
                name: formData.get('name'),
                price: formData.get('price'),
                description: formData.get('description'),
                image: formData.get('image').name,
                category_id: formData.get('category_id')
            };
            
            console.log('Product Data:', productData);
            alert('Product created successfully!\nCheck console for data.');
            
            // In a real application, you would send this to your backend:
            // fetch('/api/products', {
            //     method: 'POST',
            //     body: formData
            // })
        });

        // Reset form
        function resetForm() {
            document.getElementById('productForm').reset();
            document.getElementById('imagePreview').style.display = 'none';
        }
    </script> -->
</body>
</html>