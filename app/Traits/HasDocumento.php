<?php


namespace App\Traits;


use App\Models\Documento;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Comment\Doc;

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
    public function addDocumento(UploadedFile $file)
    {




        $documento = new Documento([
            'name' => $file->getClientOriginalName(),
            'file_name'=> $file->getClientOriginalName(),
            'mime_type'=> $file->getMimeType(),
            'size'=> $file->getSize()
        ]);


        $model = $this->getModel();

        if ($model->exists) {
            $docSaved = $this->documentos()->save($documento);

            DB::table('documentos')->whereId($docSaved->id)->updateLob(
                [],
                ['data'=> $file->getContent()]
            );

            $model->load('documentos');

        } else {

            throw new \Exception('No existe el modelo');
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
