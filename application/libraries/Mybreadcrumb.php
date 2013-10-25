<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Mybreadcrumb {

    public function bread_restaurante($url)
    {
    	switch ($url) {
    		// Por cozinha
		    case 'africanas':
		        return "Por cozinha: Africanas";
		        break;
		    case 'arabes':
		        return "Por cozinha: Árabes";
		        break;
		    case 'brasileiras':
		        return "Por cozinha: Brasileiras";
		        break;
		    case 'europeias':
		        return "Por cozinha: Europeias";
		        break;
		    case 'italianas':
		        return "Por cozinha: Italianas";
		        break;
		    case 'latinas':
		        return "Por cozinha: Latinas";
		        break;
		    case 'orientais':
		        return "Por cozinha: Orientais";
		        break;
		    case 'regionais':
		        return "Por cozinha: Regionais";
		        break;

		    // Por comida
		    case 'carnes':
		        return "Por comida: Carnes";
		        break;
		    case 'crustaceos':
		        return "Por comida: Crustáceos / Moluscos";
		        break;
		    case 'especiais':
		        return "Por comida: Light / Especiais";
		        break;
		    case 'massas':
		        return "Por comida: Massas";
		        break;
		    case 'naturais':
		        return "Por comida: Naturais";
		        break;
		    case 'peixes':
		        return "Por comida: Peixes";
		        break;
		    case 'vegetais':
		        return "Por comida: Vegetais";
		        break;

		    // Por serviços
		    case 'alacartes':
		        return "Por serviço: À la carte";
		        break;
		    case 'delivery':
		        return "Por serviço: Delivery";
		        break;
		    case 'drive-thrur':
		        return "Por serviço: Drive-Thrur";
		        break;
		    case 'rodizios':
		        return "Por serviço: Rodízios";
		        break;
		    case 'self-service':
		        return "Por serviço: Self-Service";
		        break;
		    default:
        		return "Não identificado";
		}
    }

    // Breadcrumb Lanchonete
    public function bread_lanchonete($url)
    {
    	switch ($url) {
    		// Por tipo
		    case 'doces':
		        return "Por tipo: Doces";
		        break;
		    case 'gelados':
		        return "Por tipo: Gelados";
		        break;
		    case 'massas':
		        return "Por tipo: Massas";
		        break;
		    case 'especiais':
		        return "Por tipo: Especiais";
		        break;
		    case 'naturais':
		        return "Por tipo: Naturais";
		        break;
		    case 'salgados':
		        return "Por tipo: Salgados";
		        break;

		    // Por comida
		    case 'acai':
		        return "Por comida: Açai";
		        break;
		    case 'crepes':
		        return "Por comida: Crepes";
		        break;
		    case 'doces':
		        return "Por comida: Doces";
		        break;
		    case 'fondue':
		        return "Por comida: Fondue";
		        break;
		    case 'hamburguers':
		        return "Por comida: Hamburguers";
		        break;
		    case 'iorgutes':
		        return "Por comida: Iorgutes";
		        break;
		    case 'pasteis':
		        return "Por comida: Pasteis";
		        break;
		    case 'pizzas':
		        return "Por comida: Pizzas";
		        break;
		    case 'sanduiches':
		        return "Por comida: Sanduiches";
		        break;
		    case 'sorvete-picole':
		        return "Por comida: Sorvete / Picolé";
		        break;
		    case 'sushi-temaki':
		        return "Por comida: Sushi / Temaki";
		        break;

		    // Por serviços
		    case 'fast-food':
		        return "Por serviço: Fast Food";
		        break;
		    case 'delivery':
		        return "Por serviço: Delivery";
		        break;
		    case 'drive-thrur':
		        return "Por serviço: Drive-Thrur";
		        break;
		    case 'rodizios':
		        return "Por serviço: Rodízios";
		        break;
		    default:
        		return "Não identificado";
		}
    }




}

/* End of file Mybreadcrumb.php */