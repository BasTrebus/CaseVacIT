<!-- <?php
header('Content-Type: application/json');

namespace App\Service;

use App\Entity\Sollicitatie;
use Doctrine\ORM\EntityManagerInterface;

$sollicitatie = isset($_POST["sollicitatie_id"]) ? $_POST["sollicitatie_id"] : "";


$result = [
    "melding" => ($gerecht_info->favorite($gerecht_id, $user_id)),
    "gerecht_id" => $gerecht_id,
    "user_id" => $user_id
];

echo (json_encode($result));
?> -->