<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Sample data for FreshTrack
$buyerProducts = [
    [
        "name" => "Organic Avocado",
        "price" => 300,
        "discount" => 30,
        "final" => 210,
        "stock" => 24,
        "expiry" => "6h 20m",
        "urgent" => true
    ],
    [
        "name" => "Almond Milk 1L",
        "price" => 380,
        "discount" => 15,
        "final" => 323,
        "stock" => 8,
        "expiry" => "1d 12h",
        "urgent" => false
    ],
    [
        "name" => "Greek Yogurt",
        "price" => 250,
        "discount" => 50,
        "final" => 125,
        "stock" => 3,
        "expiry" => "2h 15m",
        "urgent" => true
    ],
    [
        "name" => "Fresh Strawberries",
        "price" => 450,
        "discount" => 0,
        "final" => 450,
        "stock" => 45,
        "expiry" => "5d 3h",
        "urgent" => false
    ]
];

$sellerProducts = [
    ["product" => "Organic Avocado", "stock" => 24, "price" => 300, "discount" => 30, "expiry" => "6h left"],
    ["product" => "Greek Yogurt", "stock" => 3, "price" => 250, "discount" => 50, "expiry" => "2h left"],
    ["product" => "Spinach bunch", "stock" => 12, "price" => 89, "discount" => 0, "expiry" => "3h left"]
];

$adminProducts = [
    ["product" => "Organic Tomatoes", "seller" => "HarvestHub", "price" => 89, "expiry" => "2025-05-02", "status" => "pending"],
    ["product" => "Free-range Eggs", "seller" => "PureFarm", "price" => 165, "expiry" => "2025-04-29", "status" => "pending"],
    ["product" => "Whole Wheat Bread", "seller" => "BakeryFresh", "price" => 110, "expiry" => "2025-04-28", "status" => "approved"]
];

$users = [
    ["username" => "green_farmer", "role" => "Seller", "status" => "Pending"],
    ["username" => "freshmart", "role" => "Seller", "status" => "Approved"]
];

// Handle GET requests
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $endpoint = $_GET['endpoint'] ?? 'buyerProducts';

    switch ($endpoint) {
        case 'buyerProducts':
            echo json_encode($buyerProducts);
            break;
        case 'sellerProducts':
            echo json_encode($sellerProducts);
            break;
        case 'adminProducts':
            echo json_encode($adminProducts);
            break;
        case 'users':
            echo json_encode($users);
            break;
        default:
            echo json_encode(["error" => "Invalid endpoint"]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle POST for adding products, etc.
    $data = json_decode(file_get_contents('php://input'), true);
    // For demo, just echo back
    echo json_encode(["success" => true, "message" => "Product added", "data" => $data]);
} else {
    echo json_encode(["error" => "Method not allowed"]);
}
?>