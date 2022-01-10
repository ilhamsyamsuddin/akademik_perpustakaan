<?php

namespace App\Models;
use App\Models\User;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','description'
    ];

    public function assignLesson($data){
        $categoryId = $data['category'];
        $category = Category::find($categoryId);
        $userId = $data['user_id'];
        return $category->users()->syncWithoutDetaching($userId);
    }

    public function materials(){
        return $this->hasMany('App\Models\Material');
    }
    public function users(){
        return $this->belongsToMany(User::class,'category_user_table');
    }

    public function storeCategory($data){
        return Category::create($data);
    }

    public function allCategory(){
        return Category::all();
    }

    //same with editCategory
    public function findCategory($id){
        return Category::find($id);
    }

    public function updateCategory($data, $id){
        return Category::find($id)->update($data);
    }

    public function deleteCategory($id){
        return Category::find($id)->delete();
    }
}
