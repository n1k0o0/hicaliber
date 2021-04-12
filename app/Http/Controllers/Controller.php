<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchHouseRequest;
use App\Http\Resources\HouseResource;
use App\Models\House;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function search( SearchHouseRequest $request ): HouseResource
	{
		$query = House::when( $request->name, function ( Builder $query ) use ( $request ) {
			$query->where( 'name', 'like', '%' . $request->name . '%' );
		} )
		              ->when( $request->min_price, function ( Builder $query ) use ( $request ) {
			              $query->where( 'price', '>', $request->min_price );
		              } )
		              ->when( $request->max_price, function ( Builder $query ) use ( $request ) {
			              $query->where( 'price', '<', $request->max_price );
		              } )
		              ->when( $request->bedrooms, function ( Builder $query ) use ( $request ) {
			              $query->where( 'bedrooms', $request->bedrooms );
		              } )
		              ->when( $request->bathrooms, function ( Builder $query ) use ( $request ) {
			              $query->where( 'bathrooms', $request->bathrooms );
		              } )
		              ->when( $request->storeys, function ( Builder $query ) use ( $request ) {
			              $query->where( 'storeys', $request->storeys );
		              } )
		              ->when( $request->garages, function ( Builder $query ) use ( $request ) {
			              $query->where( 'garages', $request->garages );
		              } )
		              ->get();
		return new HouseResource( $query );
	}
}
