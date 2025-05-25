<?php

namespace App\Http\Controllers;

use App\Exports\TaiKhoanExport;
use App\Http\Controllers\Controller;
use App\Models\HocPhiModel;
use App\Models\HocSinhModel;
use App\Models\KyModel;
use App\Models\NhanVienModel;
use App\Models\PhanQuyenModel;
use App\Models\QuyenModel;
use App\Models\TaiKhoanModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
class TaiKhoanController extends Controller
{

    public function viewQuanLy(Request $request)
    {
        $query = DB::table('ql_taikhoan as tk')
            ->select(
                'tk.tai_khoan',
                'tk.id_hoc_sinh',
                'tk.id_nhan_vien',
                DB::raw('GROUP_CONCAT(pq.id_quyen) as quyen_ids')
            )
            ->leftJoin('ql_phanquyen as pq', 'tk.tai_khoan', '=', 'pq.id_tai_khoan')
            ->groupBy('tk.tai_khoan', 'tk.id_hoc_sinh', 'tk.id_nhan_vien');

        // Lọc theo các điều kiện tìm kiếm
        if ($request->filled('tk_tai_khoan')) {
            $query->where('tk.tai_khoan', 'like', '%' . $request->tk_tai_khoan . '%');
        }
        if ($request->filled('tk_quyen')) {
            $query->where('pq.id_quyen', '=', $request->tk_quyen);
        }
        if ($request->filled('tk_ma_hoc_sinh')) {
            $query->where('tk.id_hoc_sinh', 'like', '%' . $request->tk_ma_hoc_sinh . '%');
        }
        if ($request->filled('tk_nhan_vien')) {
            $query->where('tk.id_nhan_vien', 'like', '%' . $request->tk_nhan_vien . '%');
        }

        $data['tai_khoans'] = $query->get();
        $data['quyens'] = DB::table('dm_quyen')->get(); // hoặc dùng QuyenModel::all();

        // Giữ lại input lọc để đổ lại form
        $data['tk_tai_khoan'] = $request->tk_tai_khoan;
        $data['tk_quyen'] = $request->tk_quyen;
        $data['tk_ma_hoc_sinh'] = $request->tk_ma_hoc_sinh;
        $data['tk_nhan_vien'] = $request->tk_nhan_vien;

        return view('Quan_ly_tai_khoan.quan_ly_tai_khoan', $data);
    }
    public function viewCaiDat(Request $request)
    {
        $data=[];
        return view('Quan_ly_tai_khoan.cai_dat_tai_khoan',$data);
    }
//---------------------------------------
    public function xlDoiMK(Request $request){
        $tai_khoan = TaiKhoanModel::find($request->tai_khoan);
        if($tai_khoan->mat_khau != md5($request->mat_khau_cu)){
            session()->flash('bao_loi', 'Mật khẩu không đúng');
            return redirect()->route('cai_dat_tk');
        }
        if($request->mat_khau_moi != $request->xac_nhan){
            session()->flash('bao_loi', 'Mật khẩu xác nhận không giống với mật khẩu mới');
            return redirect()->route('cai_dat_tk');
        }
        $tai_khoan->mat_khau = md5($request->mat_khau_moi);
        $tai_khoan->save();
        session()->flash('bao_loi', 'Cập nhật mật khẩu thành công');
        if(session('la_khach') == 'true'){
            return redirect()->route('ph_sua_tai_khoan');
        }else{
            return redirect()->route('cai_dat_tk');
        }
        
    }
    public function xlPhanQuyen(Request $request){
        $phan_quyens = PhanQuyenModel::where('id_tai_khoan','=',$request->tai_khoan)->get();
        foreach($phan_quyens as $phan_quyen){
            $phan_quyen->delete();
        }
        foreach($request->quyen as $quyen){
            $phan_quyen = new PhanQuyenModel();
            $phan_quyen->id_tai_khoan = $request->tai_khoan;
            $phan_quyen->id_quyen = $quyen;
            $phan_quyen->save();
        }
        session()->flash('bao_loi', 'Cập nhật quyền thành công');
        return redirect()->route('ql_tk');
    }

    public function export(Request $request){
        $query = TaiKhoanModel::query()->select ('*');
        $query = $query->get();
        return Excel::download(new TaiKhoanExport($query), 'export_tk.xlsx');
    }
    public function viewBaoCao(Request $request){
        $current_year = date('Y');
        $data['months']=[];
        $data['years'] = [];
        $data['hs_thang'] = [];
        $data['nv_thang'] = [];
        $data['hs_nam'] = [];
        $data['nv_nam'] = [];
        $ky_hien_tai = KyModel::where('tu_ngay','<=',date('Y-m-d'))->where('den_ngay','>=',date('Y-m-d'))->first();
        $hoc_sinh_di_bus = HocSinhModel::where('trang_thai',1)->where('di_bus',1)->count();
        $hoc_sinh_khong_di_bus = HocSinhModel::where('trang_thai',1)->where('di_bus',0)->count();
        $data['di_bus'] = [$hoc_sinh_di_bus,$hoc_sinh_khong_di_bus];
        if($ky_hien_tai->ky == 1){
            $ky_sau = KyModel::find($ky_hien_tai->id+1);
            $hp_ky_1 = HocPhiModel::where('ngay_tao','>=',$ky_hien_tai->tu_ngay)
            ->where('ngay_tao','<=',$ky_hien_tai->den_ngay)
            ->whereNotNull('ngay_thanh_toan')
            ->where(function ($query)  {
                $query->where('loai_hoc_phi',0)
                ->orWhere('loai_hoc_phi',2);
                })
            ->sum('tong_so_tien');
            $hp_ky_2 = HocPhiModel::where('ngay_tao','>=',$ky_sau->tu_ngay)
            ->where('ngay_tao','<=',$ky_sau->den_ngay)
            ->whereNotNull('ngay_thanh_toan')
            ->where(function ($query)  {
                $query->where('loai_hoc_phi',0)
                ->orWhere('loai_hoc_phi',2);
            })
            ->sum('tong_so_tien');
            $hp_nam = HocPhiModel::where('ngay_tao','>=',$ky_hien_tai->tu_ngay)
            ->where('ngay_tao','<=',$ky_sau->den_ngay)
            ->where('loai_hoc_phi',1)
            ->whereNotNull('ngay_thanh_toan') 
            ->sum('tong_so_tien');
        }
        else{
            $ky_truoc = KyModel::find($ky_hien_tai->id-1);
            $hp_ky_1 = HocPhiModel::where('ngay_tao','>=',$ky_truoc->tu_ngay)
            ->where('ngay_tao','<=',$ky_truoc->den_ngay)
            ->whereNotNull('ngay_thanh_toan')
            ->where(function ($query)  {
                $query->where('loai_hoc_phi',0)
                ->orWhere('loai_hoc_phi',2);
                })
            ->sum('tong_so_tien');
            $hp_ky_2 = HocPhiModel::where('ngay_tao','>=',$ky_hien_tai->tu_ngay)
            ->where('ngay_tao','<=',$ky_hien_tai->den_ngay)
            ->whereNotNull('ngay_thanh_toan')
            ->where(function ($query)  {
                $query->where('loai_hoc_phi',0)
                ->orWhere('loai_hoc_phi',2);
                })
            ->sum('tong_so_tien');
            $hp_nam = HocPhiModel::where('ngay_tao','>=',$ky_truoc->tu_ngay)
            ->where('ngay_tao','<=',$ky_hien_tai->den_ngay)
            ->where('loai_hoc_phi',1)
            ->whereNotNull('ngay_thanh_toan') 
            ->sum('tong_so_tien');
        }
        $data['doanh_thu'] = [($hp_ky_1+($hp_nam/2))/1000000, ($hp_ky_2+($hp_nam/2))/1000000,($hp_ky_1+$hp_ky_2+$hp_nam)/1000000];
        // dd($data['doanh_thu']);
        for ($i = 1;$i<=12;$i++){
            $data['months'][] = 'Tháng '.$i;
            $date = Carbon::create($current_year, $i, 1);
            $lastDay = $date->endOfMonth()->toDateString();
            $hoc_sinh_thang = HocSinhModel::where('ngay_nhap_hoc','<=',$lastDay)
            ->where(function ($query) use ($lastDay)  {
                    $query->where('ngay_thoi_hoc', null)
                    ->orWhere('ngay_thoi_hoc','>', $lastDay);
                    })->count();
            $data['hs_thang'][] = $hoc_sinh_thang;
            $gv_thang = NhanVienModel::leftJoin('dm_chucvu','dm_chucvu.id','=','ql_nhanvien.id_chuc_vu')
            ->where('ngay_vao_lam','<=',$lastDay)
            ->where(function ($query)  {
                $query->where('bo_phan', 'Giáo viên VN')
                ->orWhere('bo_phan','Giáo viên nước ngoài');
                })
            ->where(function ($query) use ($lastDay)  {
                    $query->where('ngay_nghi_viec', null)
                    ->orWhere('ngay_nghi_viec','>', $lastDay);
                    })->count();
            $data['nv_thang'][] = $gv_thang;
        }
        for($i = 2023;$i<=date('Y');$i++){
            $data['years'][] = $i.' - '.$i+1;
            $hoc_sinh_nam = HocSinhModel::where('ngay_nhap_hoc','>=',$i.'-07-01')
            ->where(function ($query) use ($i)  {
                $query->where('ngay_thoi_hoc', null)
                ->orWhere('ngay_thoi_hoc','<=', ($i+1).'-06-30');
            })->count();
            $data['hs_nam'][] = $hoc_sinh_nam;
            $gv_nam = NhanVienModel::leftJoin('dm_chucvu','dm_chucvu.id','=','ql_nhanvien.id_chuc_vu')
            ->where('ngay_vao_lam','<=', ($i+1).'-06-30')
            ->where(function ($query)  {
                $query->where('bo_phan', 'Giáo viên VN')
                ->orWhere('bo_phan','Giáo viên nước ngoài');
            })
            ->where(function ($query) use ($i)  {
                $query->where('ngay_nghi_viec', null)
                ->orWhere('ngay_nghi_viec','<=', ($i+1).'-06-30');
            })->count();
            $data['nv_nam'][] = $gv_nam;
        }
        return view('Thong_ke_bao_cao.thong_ke_bao_cao', $data);
    }
}
