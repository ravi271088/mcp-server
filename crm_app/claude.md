# CRM Attendance System - Laravel Implementation

This document outlines the structure for a simple CRM Attendance Record system built using the Laravel framework, designed to track employee attendance.

## 1. Database Migration (Attendance Records Table)

This migration defines the structure for storing attendance data in the database.

**File:** `database/migrations/<timestamp>_create_attendance_records_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceRecordsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendance_records', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name'); // Employee Name
            $table->date('attendance_date'); // Date of Attendance
            $table->time('time_in');         // Time In
            $table->time('time_out')->nullable(); // Time Out (Optional)
            $table->enum('status', ['Present', 'Absent', 'Late', 'On Leave']); // Attendance Status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_records');
    }
}
```

## 2. Model Definition

This defines the Eloquent Model to interact with the `attendance_records` table.

**File:** `app/Models/AttendanceRecord.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceRecord extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'employee_name',
        'attendance_date',
        'time_in',
        'time_out',
        'status'
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'attendance_date' => 'date',
    ];
}
```

## Next Steps:

1.  **Setup Laravel:** Ensure you have a fresh Laravel project initialized in your directory.
2.  **Run Setup Commands:** Run `php artisan migrate` to create the database table based on the migration above.
3.  **Create Model:** Run `php artisan make:model AttendanceRecord` to create the model.
4.  **Implement Controller:** Create a controller (e.g., `php artisan make:controller AttendanceRecordController`) to handle the application logic for recording and retrieving attendance.