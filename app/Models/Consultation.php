Schema::create('consultations', function (Blueprint $table) {

$table->id();

$table->foreignId('order_id')
->constrained()
->cascadeOnDelete();

$table->string('topik');

$table->text('catatan')->nullable();

$table->enum('status', [
'pending',
'berlangsung',
'selesai'
])->default('pending');

$table->timestamps();
});