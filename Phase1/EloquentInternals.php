<?php

use Illuminate\Database\Eloquent\Casts\Attribute;

class user{

    // get() and set() magic methods
    
    public function __get($key)
    {
        return $this->getAttribute($key);
    }
    
    public function __set($key, $value)
    {
        $this->setAttribute($key, $value);
    }
    
    
    // Attribute Handling
    
    // Model Property
    //       ↓
    // getAttribute()
    //       ↓
    // Attribute / Accessor?
    //       ↓
    // Relationship?
    //       ↓
    // Raw Attribute?
    //       ↓
    // Return Value

    
    
    // Casts
    protected $casts = [
        'is_active' => 'boolean',
        'age' => 'integer',
        'settings' => 'array',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'settings' => 'array',
        ];
    }



    // Accessors
    // Accessor ব্যবহার করে attribute get করার সময় transform করতে পারেন।
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => "{$this->first_name} {$this->last_name}",
        );
    }

    // Mutators
    // Mutator ব্যবহার করে attribute save করার আগে transform করতে পারেন।
    protected function email(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => strtolower($value),
        );
    }

    // $user->email = 'HRIDOY@EXAMPLE.COM';
    // output: hridoy@example.com;

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),

            set: fn (string $value) => strtolower($value),
        );
    }




// Dirty Attributes
// $user->name = 'Hridoy';

// $user->save();
// // Laravel track করে কোন attribute পরিবর্তন হয়েছে।
// $user->isDirty('name');
// // true
// $user->getDirty();

// [
//     'name' => 'Hridoy',
//     'email' => 'hridoy@example.com',
// ]
// $user->getChanges();
// এটা recently saved changes দেখাতে পারে।
// isDirty() বনাম wasChanged()
// Before save
//      ↓
//   isDirty()
//      ↓
//    save()
//      ↓
// Database UPDATE
//      ↓
// wasChanged()


// $user = User::find(1);

// dump($user->getOriginal('password'));

// $user->password = Hash::make('new-password');

// dump($user->isDirty('password'));
// dump($user->getDirty());

// $user->save();

// dump($user->wasChanged('password'));
// dump($user->getChanges());


// Model Events
// retrieved
// creating
// created
// updating
// updated
// saving
// saved
// deleting
// deleted
// restoring
// restored

protected static function booted(): void
{
    static::creating(function (User $user) {
        logger('CREATING');
    });

    static::created(function (User $user) {
        logger('CREATED');
    });

    static::updating(function (User $user) {
        logger('UPDATING');
    });

    static::updated(function (User $user) {
        logger('UPDATED');
    });

    static::saving(function (User $user) {
        logger('SAVING');
    });

    static::saved(function (User $user) {
        logger('SAVED');
    });
}




// php artisan make:observer UserObserver --model=User
// User Created
//      ↓
// UserObserver
//      ├── Create Profile
//      ├── Activity Log
//      ├── Notification
//      └── Other automatic tasks

        //             User
        //              │
        //       Model Event
        //              │
        //              ▼
        //        UserObserver
        //       /     |      \
        //      /      |       \
        // Activity   Job    Profile
        //   Log    Dispatch   Create

        // public function updating(User $user): void
        // {
        //     if ($user->isDirty('password')) {

        //         ActivityLog::create([
        //             'user_id' => $user->id,
        //             'action' => 'password_changed',
        //         ]);
        //     }
        // }

}



?>