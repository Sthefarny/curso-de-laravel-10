namespace App\Htpp\Controllers\Admin;

use App\Http\Controllers\Controler;
use Aoo\Models\Supports;
use Illuminate\Http\Request;

class SupportController extends Controllers{
    public function index (Supports $support){
        $supports = $support -> all();
        $xss = '<s>';
            return view ('admin/supports/index', compact('supports'));
    }

}
