# Titan MVC Multi Level Menu

Visit : https://github.com/tkaratug/titan-mvc and http://kilavuz.titanphp.com/

## Model

###	MenuListele Models	
```bash
class Menum extends Model
 {
    public function MenuListele() {
		
         $SQL = $this->db->query("SELECT `id`, `menuAdi`, `menuLink`, `ustId`, `sirasi` FROM `menuler` ORDER BY ustId, sirasi, menuAdi")->results('array');
		 
		 return $SQL;
    }
 }
```
## Contrroller

### Index Controller
```bash
public function index() {
	$this->load->plugin('menu');
	
	$Menuayarlar = [
		'menuAdi'    => 'menuAdi',
		'menuLink'   => 'menuLink',
		'ulAc' 		 => '<ul class="ustUl">',
		'AltulAc' 	 => '<ul class="altUl">',
		'liAc' 		 => '<li class="ustLi">',
		'AltliAc' 	 => '<li class="altLi">'
	];
	$this->menu->init($Menuayarlar);
	
	$this->load->model('menum');
	
	$data['menuler'] = $this->menum->MenuListele();
	
	$this->load->view('home_view', $data);
 }
```

## View
```bash
$this->menu->olustur(0,$menuler);
```
