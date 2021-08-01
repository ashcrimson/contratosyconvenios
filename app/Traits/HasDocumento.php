<?php


namespace App\Traits;


use App\Models\Documento;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Auth;

trait HasDocumento
{

    /**
     * Set the polymorphic relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function documentos(): MorphMany
    {
        return $this->morphMany(Documento::class, 'model');
    }

    /**
     * @return Documento
     */
    public function getLastDocumento()
    {
        return $this->documentos()->orderBy('id','desc')->first();
    }


    /**
     * Assign the given role to the model.
     *
     * @param array|string|\Spatie\Permission\Contracts\Role ...$roles
     *
     * @return $this
     */
    public function addDocumento($titulo,$descripcion,$servicioEstadoId,$user=null)
    {
        $user = Auth::user() ?? $user;

        $documento = new Documento([
            'name',
            'file_name',
            'mime_type',
            'size',
            'data'
        ]);

        $model = $this->getModel();

        if ($model->exists) {
            $this->documentos()->save($documento);
            $model->load('documentos');
        } else {
            $class = \get_class($model);

            $class::saved(
                function ($object) use ($documento, $model) {
                    static $modelLastFiredOn;
                    if ($modelLastFiredOn !== null && $modelLastFiredOn === $model) {
                        return;
                    }
                    $object->documentos()->sync($documento, false);
                    $object->load('documentos');
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
    public function deleteDocumento($documento)
    {
        $this->documentos()->delete($documento);

        $this->load('documentos');

        return $this;
    }
}
