<?php

use App\Enum\Log\LogTypeEnum;
use App\Models\Log;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('logs', function ( Blueprint $table ) {
            $table->id();
            $table->ipAddress(Log::IP)->index();

            $table->enum(Log::TYPE, [
                LogTypeEnum::LOGIN_REQUEST,
            ])->index();

            $table->timestamp(Log::CREATED_AT)->useCurrent()->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('logs');
    }
};
