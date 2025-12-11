
public function up()
{
    Schema::table('players', function (Blueprint $table) {
        $table->softDeletes();
    });
}

public function down()
{
    Schema::table('players', function (Blueprint $table) {
        $table->dropSoftDeletes();
    });
}