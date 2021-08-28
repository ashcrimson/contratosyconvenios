<?php


namespace App\Traits;


use App\Models\Bitacora;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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
     * @return Bitacora|false|\Illuminate\Database\Eloquent\Model
     */
    public function addBitacora($titulo=null,$descripcion,$user=null)
    {
        $user = auth()->user()->id ?? $user;

        $bitacora = new Bitacora([
            'seccion' => null,
            'titulo' => $titulo,
            'descripcion' => $descripcion,
            'user_crea' => $user,
        ]);

        $model = $this->getModel();

        if ($model->exists) {
            $new = $this->bitacoras()->save($bitacora);
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

        return $new;
    }


}
