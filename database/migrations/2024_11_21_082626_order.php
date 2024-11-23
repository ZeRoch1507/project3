

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Check if the products table doesn't exist before creating it
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();  // Auto-incrementing ID for each product
                $table->string('name');  // Name of the product
                $table->decimal('price', 10, 2);  // Price of the product
                $table->text('description')->nullable();  // Product description
                $table->string('image')->nullable();  // Product image URL (optional)
                $table->timestamps();  // Created and updated timestamps
                $table->softDeletes();  // Enables soft delete for products
                $table->unsignedBigInteger('category_id');  // Foreign key to categories table

                // Add foreign key constraint to the category_id column
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('products');  // Drop products table if exists
    }
};
