namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
class VehicleExport implements FromCollection {
    public function collection() {
        return Vehicle::all();
    }
}