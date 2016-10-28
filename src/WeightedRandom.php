<?php

namespace Karer;

class WeightedRandom
{
	private $weights;

	/**
	 * Returns index of weight-based random element in array
	 * @param int $weights
	 */
	public function __construct($weights)
	{
		$this->weights = $weights;
	}

	public function get()
	{
		$rand = mt_rand(1, (int) array_sum($this->weights));

		foreach ($this->weights as $key => $value) {
			$rand -= $value;
			if ($rand <= 0) {
				return $key;
			}
		}
	}
}