<?php /** @noinspection PhpLanguageLevelInspection */


namespace App\Traits;


use App\Models\Telefono;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;


/**
 * @property \Illuminate\Database\Eloquent\Collection $telefonos
 */
trait HasTelefonos
{
    private $telefonoClass;

    public static function bootHasTelefonos()
    {
        static::deleting(function ($model) {
            if (method_exists($model, 'isForceDeleting') && ! $model->isForceDeleting()) {
                return;
            }

            $model->telefonos()->detach();
        });
    }

    public function getTelefonoClass()
    {
        if (! isset($this->roleClass)) {
//            $this->telefonoClass = app(PermissionRegistrar::class)->getTelefonoClass();
            $this->telefonoClass = app(Telefono::class);
        }

        return $this->telefonoClass;
    }


    public function telefonos(): MorphMany
    {
        return $this->morphMany(Telefono::class,'model');
    }

    public function scopeTelefono(Builder $query, $telefonos): Builder
    {
        if ($telefonos instanceof Collection) {
            $telefonos = $telefonos->all();
        }

        if (! is_array($telefonos)) {
            $telefonos = [$telefonos];
        }

        $telefonos = array_map(function ($telefono) {
            if ($telefono instanceof Telefono) {
                return $telefono;
            }

            $method = is_numeric($telefono) ? 'findById' : 'findByName';

            return $this->getTelefonoClass()->{$method}($telefono);
        }, $telefonos);

        return $query->whereHas('telefonos', function (Builder $subQuery) use ($telefonos) {
            $subQuery->whereIn('telefonos.id', \array_column($telefonos, 'id'));
        });
    }

    public function addTelefono(...$telefonos)
    {



        $telefonos = collect($telefonos)
            ->flatten()
            ->map(function ($numero) {

                return new Telefono(['numero' => $numero]);
            });


        $model = $this->getModel();

        if ($model->exists) {
            $this->telefonos()->saveMany($telefonos);
            $model->load('telefonos');
        } else {
            $class = \get_class($model);

            $class::saved(
                function ($object) use ($telefonos, $model) {
                    $model->telefonos()->saveMany($telefonos);
                    $model->load('telefonos');
                }
            );
        }


        return $this;
    }

    public function removeTelefono($telefono)
    {
        $this->telefonos()->where('numero', '=', $telefono)->delete();

        $this->load('telefonos');

        return $this;
    }

    public function syncTelefonos(...$telefonos)
    {
        $this->telefonos()->delete();

        return $this->addTelefono($telefonos);
    }


    public function getTelefonoNames(): Collection
    {
        return $this->telefonos->pluck('name');
    }


}
