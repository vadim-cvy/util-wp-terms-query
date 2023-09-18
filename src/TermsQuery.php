<?php
namespace Cvy\WP\TermsQuery;

class TermsQuery extends \Cvy\WP\ObjectsQuery\ObjectsQuery
{
  final protected function execute() : array
  {
    $results = get_terms( $this->args );

    if ( is_wp_error( $results ) )
    {
      throw new \Exception( $results->get_error_message() );
    }

    return array_column( $results, 'term_id' );
  }

  public function patch( array $args, array $merge_strategy = [] ) : void
  {
    if ( isset( $args['fields'] ) )
    {
      throw new Exception( '"fields" arg must not be patched!' );
    }

    parent::patch( $args, $merge_strategy );
  }
}
