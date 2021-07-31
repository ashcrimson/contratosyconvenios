<?php


namespace App\Traits;


use App\Models\Bitacora;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Auth;

trait HasBitacora
{

    /**
     * Set the polymorphic relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function bitacoras(): MorphMany
    {
        return $this->morphMany(Bitacora::class, 'model');
    }


    /**
     * Assign the given role to the model.
     *
     * @param array|string|\Spatie\Permission\Contracts\Role ...$roles
     *
     * @return $this
     */
    public function addBitacora($titulo,$descripcion,$servicioEstadoId,$user=null)
    {
        $user = Auth::user() ?? $user;

        $bitacora = new Bitacora([
            'servicio_estado_id' => $servicioEstadoId,
            'titulo' => $titulo,
            'descripcion' => $descripcion,
            'cliente_puede_ver' => true,
            'user_id' => $user->id,
            'sucursal_id' => getSucursal()
        ]);

        $model = $this->getModel();

        if ($model->exists) {
            $this->bitacoras()->save($bitacora);
            $model->load('bitacoras');
        } else {
            $class = \get_class($model);

            $class::saved(
                function ($object) use ($bitacora, $model) {
                    static $modelLastFiredOn;
                    if ($modelLastFiredOn !== null && $modelLastFiredOn === $model) {
                        return;
                    }
                    $object->bitacoras()->sync($bitacora, false);
                    $object->load('bitacoras');
                    $modelLastFiredOn = $object;
                });
        }

        return $this;
    }

    /**
     * Revoke the given role from the model.
     *
     * @param string|\Spatie\Permission\Contracts\Role $role
     */
    public function deleteBitacora($bitacora)
    {
        $this->bitacoras()->delete($bitacora);

        $this->load('bitacoras');

        return $this;
    }
}
