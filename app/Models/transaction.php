<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Transaction",
 *     type="object",
 *     title="Transaction",
 *     description="Transaction model",
 *     required={"amount", "type", "date", "name"},
 *     @OA\Property(
 *         property="id",
 *         description="ID de la transaction",
 *         type="integer",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="user_id",
 *         description="ID de l'utilisateur associé",
 *         type="integer",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="amount",
 *         description="Montant de la transaction",
 *         type="number",
 *         format="float",
 *         example=150.75
 *     ),
 *     @OA\Property(
 *         property="type",
 *         description="Type de la transaction (revenue ou expense)",
 *         type="string",
 *         example="revenue"
 *     ),
 *     @OA\Property(
 *         property="date",
 *         description="Date de la transaction",
 *         type="string",
 *         format="date",
 *         example="2024-09-01"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         description="Nom de la transaction",
 *         type="string",
 *         example="Vente de produit"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         description="Date de création",
 *         type="string",
 *         format="datetime",
 *         example="2024-09-01T12:30:00.000000Z"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         description="Date de mise à jour",
 *         type="string",
 *         format="datetime",
 *         example="2024-09-02T12:30:00.000000Z"
 *     )
 * )
 */
class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount', 
        'type', 
        'date', 
        'name', 
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
