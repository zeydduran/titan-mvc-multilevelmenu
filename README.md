# Titan MVC Multi Level Menu

Visit : https://github.com/tkaratug/titan-mvc and http://kilavuz.titanphp.com/

## Model

###	Menu Model	
```bash
class Menu extends Model
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

	$this->load->plugin('multimenu');

	$Menuayarlar = [
		'menuId'     => 'id', // Veritabanında yer alan menü id\'nize ait sütun adını belirtiniz.
		'menuAdi'    => 'menuAdi', // Veritabanında yer alan menü adınıza ait sütun adını belirtiniz.
		'menuLink'   => 'menuLink', // Veritabanında yer alan menü linkinize ait sütun adını belirtiniz.
		'menuUstid'  => 'ustId', // Veritabanında yer alan menü üst id\'nize ait sütun adını belirtiniz.
		'ulAc'       => '<ul class="ustUl">',
		'AltulAc'    => '<ul class="altUl">',
		'liAc'       => '<li class="ustLi">',
		'AltliAc'    => '<li class="altLi">'
	];
	$this->multimenu->init($Menuayarlar);

	$this->load->model('menu');

	$data['menuler'] = $this->menu->MenuListele();

	$this->load->view('home_view', $data);
	
 }
```

## View
```bash

echo $this->multimenu->olustur($menuler);

```
